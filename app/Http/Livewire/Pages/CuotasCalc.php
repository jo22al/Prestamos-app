<?php

namespace App\Http\Livewire\Pages;

use DB;
use App\Models\Client;
use App\Models\Prestamo;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;
use Livewire\WithFileUploads;


class CuotasCalc extends Component
{

    use WithFileUploads;

    public $cuotas = [];

    public
        $monto,
        $monto_cuota,
        $interes_seleccionado,
        $interes,
        $fecha_pago,
        $periocidad_pago,
        $img_auto,
        $estado_prestamo,
        $mora,
        $id_client;

    public $cuota_minima;
    public $isUploading = false;

    public function savePrestamo()
    {
        $this->cuotas = [];
        $this->checkMonto();
        $validatedData = $this->validate([
            'monto' => 'required',
            'monto_cuota' => ['required', 'numeric', $this->cuota_minima],
            'interes_seleccionado' => 'required',
            'interes' => 'required',
            'fecha_pago' => 'required',
            'periocidad_pago' => 'required',
            'img_auto' => 'image|mimes:jpg,jpeg,png',
            'id_client' => 'required'
        ]);

        if (!empty($validatedData['img_auto'])) {
            $validatedData['img_auto'] = $this->img_auto->store('autos', 'public');
        }

        if(!empty($validatedData['monto'])) {
            $validatedData['saldo'] = $validatedData['monto'];
        }

        Prestamo::create($validatedData);
        session()->flash('message', 'Prestamos registrado correctamente');
        $this->dispatchBrowserEvent('load-select');
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->monto = '';
        $this->monto_cuota = '';
        $this->interes_seleccionado = '';
        $this->interes = '';
        $this->fecha_pago = '';
        $this->periocidad_pago = '';
        $this->img_auto = '';
        $this->id_client = '';
    }

    public function calcularCuotas()
    {
        $this->checkMonto();

        $this->validate([
            'monto' => 'required',
            'monto_cuota' => ['required', 'numeric', $this->cuota_minima],
            'interes_seleccionado' => 'required',
            'interes' => 'required',
            'fecha_pago' => 'required',
            'periocidad_pago' => 'required',
            'id_client' => 'required'
        ]);

        $result = DB::select('call SP_CUOTAS(?,?,?,?,?,?)', array(
            $this->monto,
            $this->monto_cuota,
            $this->interes_seleccionado,
            $this->interes,
            $this->fecha_pago,
            $this->periocidad_pago
        ));

        // $result = DB::select("call SP_CUOTAS(40000,3000, 'FIJO', 500, '2022-10-01', 'M')");
        $this->cuotas = $result;
    }


    public function checkMonto()
    {

        $this->validate([
            'monto' => 'required',
            'monto_cuota' => 'required',
            'interes_seleccionado' => 'required',
            'interes' => 'required',
        ]);

        if ($this->interes_seleccionado == 'PORCENTAJE') {
            $inter = $this->interes / 100;
            $totInteres = $inter * $this->monto;
        }

        if ($this->interes_seleccionado == 'FIJO') {
            $inter = $this->interes;
            $totInteres = $inter;
        }

        $cap = $this->monto_cuota - $totInteres;

        if ($cap <= 0) {
            $this->dispatchBrowserEvent('close-modal');
            $requerido = $this->monto_cuota + abs($cap) + 100;
            $this->cuota_minima = 'min:' . $requerido;
        }
    }



    public function closeModal()
    {
        $this->cuotas = [];
    }

    public function downloadPdf()
    {

        $this->cuotas = [];

        $this->validate([
            'monto' => 'required',
            'monto_cuota' => ['required', 'numeric', $this->cuota_minima],
            'interes_seleccionado' => 'required',
            'interes' => 'required',
            'fecha_pago' => 'required',
            'periocidad_pago' => 'required',
            'id_client' => 'required'
        ]);

        $client = Client::where('id', $this->id_client)->get()->first();

        $result = DB::select('call SP_CUOTAS(?,?,?,?,?,?)', array(
            $this->monto,
            $this->monto_cuota,
            $this->interes_seleccionado,
            $this->interes,
            $this->fecha_pago,
            $this->periocidad_pago
        ));

        $this->cuotas = $result;
        $pdf = Pdf::loadView('livewire.export.cuotas', [
            'result' => $result,
            'client' => $client
            ])->output();

        return response()->streamDownload(
            fn () => print($pdf),
            'descarga.pdf'
        );
    }

    public function render()
    {
        $clients = Client::all();
        $intereses = ['PORCENTAJE', 'FIJO'];
        $porcentajes = [2, 3, 5, 10, 15, 20];
        $periodicidades = ['M', 'W', 'Q'];
        return view('livewire.pages.cuotas-calc', [
            'clients' => $clients,
            'intereses' => $intereses,
            'porcentajes' => $porcentajes,
            'periodicidades' => $periodicidades
        ]);
    }
}
