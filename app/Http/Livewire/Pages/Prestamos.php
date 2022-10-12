<?php

namespace App\Http\Livewire\Pages;

use App\Models\Prestamo;
use Livewire\Component;

class Prestamos extends Component
{
    public $search;

    public function render()
    {
        $prestamos = Prestamo::where('monto', 'like', '%' . $this->search . '%')->orderBy('id', 'ASC')->paginate(8);
        return view('livewire.pages.prestamos', ['prestamos' => $prestamos]);
    }
}
