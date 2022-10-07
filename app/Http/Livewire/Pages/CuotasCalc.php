<?php

namespace App\Http\Livewire\Pages;

use App\Models\Client;
use DB;
use Livewire\Component;
use Livewire\WithFileUploads;


class CuotasCalc extends Component
{

    use WithFileUploads;

    public $cuotas = null;

    public
        $monto,
        $monto_cuota,
        $interes,
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
            'interes' => 'required',
            'porcentaje' => 'required',
            'fecha_pago' => 'required',
            'periocidad_pago' => 'required',
            'img_auto' => 'image|mimes:jpg,jpeg,png',
            'id_client' => 'required',
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
        $result = DB::select('call SP_CUOTAS(?,?,?,?,?,?)', array(
            // $monto,
            // $monto_cuota,
            // $interes,
            // $porcentaje,
            // $fecha_pago,
            // $periocidad_pago,
            $this->monto, $this->monto_cuota, $this->interes, $this->porcentaje, $this->fecha_pago, $this->periocidad_pago
        ));

        // $result = DB::select("call SP_CUOTAS(40000,3000, 'FIJO', 500, '2022-10-01', 'M')");
        $this->cuotas = $result;
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
