<?php

namespace App\Http\Livewire\Pages;

use DB;
use App\Models\Client;
use Livewire\Component;
use Livewire\WithFileUploads;


class CuotasCalc extends Component
{

    use WithFileUploads;

    public $cuotas = null;

    public
        $monto,
        $monto_cuota,
        $selectedInteres,
        $porcentaje,
        $fecha_pago,
        $periocidad_pago,
        $img_auto,
        $estado_prestamo,
        $mora,
        $id_client;


    protected function rules()
    {
        return [
            'monto' => 'required',
            'monto_cuota' => 'required',
            'selectedInteres' => 'required',
            'porcentaje' => 'required',
            'fecha_pago' => 'required',
            'periocidad_pago' => 'required',
            'img_auto' => 'image|mimes:jpg,jpeg,png',
            'id_client' => 'required',
            'selectedInteres' => 'required'
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function savePrestamo()
    {
        $validatedData = $this->validate();
    }

    public function calcularCuotas()
    {

        $this->validate([
            'monto' => 'required',
            'monto_cuota' => 'required',
            'selectedInteres' => 'required',
            'porcentaje' => 'required',
            'fecha_pago' => 'required',
            'periocidad_pago' => 'required',
        ]);

        $result = DB::select('call SP_CUOTAS(?,?,?,?,?,?)', array(
            $this->monto,
            $this->monto_cuota,
            $this->selectedInteres,
            $this->porcentaje,
            $this->fecha_pago,
            $this->periocidad_pago
        ));

        // $result = DB::select("call SP_CUOTAS(40000,3000, 'FIJO', 500, '2022-10-01', 'M')");
        $this->cuotas = $result;
    }

    public function closeModal()
    {
        $this->cuotas = null;
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
