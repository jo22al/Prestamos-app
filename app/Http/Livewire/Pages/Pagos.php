<?php

namespace App\Http\Livewire\Pages;

use App\Models\Pago;
use App\Models\Prestamo;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;


class Pagos extends Component
{

    use WithPagination;
    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    public $id_prestamo, $monto, $fecha_pago, $tipo_de_evidencia, $img_deposito;
    public $search;

    protected function rules()
    {
        return [
            'id_prestamo' => 'required',
            'monto' => 'required',
            'fecha_pago' => 'required',
            'tipo_de_evidencia' => 'required',
            'img_deposito' => 'required|image|mimes:jpg,jpeg,png',
        ];
    }

    public function savePago()
    {
        $validatedData = $this->validate();

        if (!empty($validatedData['img_deposito'])) {
            $validatedData['img_deposito'] = $this->img_deposito->store('depositos', 'public');
        }

        
        
        $prestamo = Prestamo::select('*')
                    ->where('id', $validatedData['id_prestamo'])
                    ->first();


        $nuevo_saldo = DB::select('call SP_PAGOS(?,?,?,?,?,?,?)', array(
            $validatedData['id_prestamo'],
            $prestamo->saldo,
            $prestamo->fecha_pago,
            $prestamo->interes_seleccionado,
            $prestamo->interes,
            $prestamo->periocidad_pago,
            $validatedData['monto'],
        ));


        $validatedData['saldo_anterior'] = $prestamo->saldo;
        $validatedData['nuevo_saldo'] = $nuevo_saldo[0]->saldo;


        Pago::create($validatedData);
        session()->flash('message', 'Pago registrado correctamente');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function updatedIdPrestamo($prestamo_id)
    {
        $res = Prestamo::select('*')->where('id', $prestamo_id)->first();
        $this->monto = $res->monto_cuota;
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->id_prestamo = '';
        $this->monto = '';
        $this->fecha_pago = '';
        $this->tipo_de_evidencia = '';
        $this->img_deposito = '';
    }

    public function render()
    {
        $prestamos = Prestamo::all();
        $pagos = Pago::where('monto', 'like', '%' . $this->search . '%')->orderBy('id', 'ASC')->paginate(8);
        return view('livewire.pages.pagos', [
            'pagos' => $pagos,
            'prestamos' => $prestamos
        ]);
    }
}
