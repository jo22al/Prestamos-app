<?php

namespace App\Http\Livewire\Pages;

use App\Models\Prestamo;
use Livewire\Component;

class PrestamosDetalle extends Component
{

    public $prestamo;


    public function mount($id)
    {
        $prestamo = Prestamo::findOrFail($id);
        $this->prestamo = $prestamo;
    }

    public function render()
    {

        return view('livewire.pages.prestamos-detalle');
    }
}
