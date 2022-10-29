<?php

namespace App\Http\Livewire\Pages;

use App\Models\Client;
use App\Models\Pago;
use Livewire\Component;

class ReportIngresos extends Component
{

    public string $componentName;
    public $pagos;

    public function mount()
    {
        $this->componentName    = 'Reporte de Ingresos';
        $this->pagos             = [];
    }

    public function render()
    {
        $this->reporteIngresos();
        return view('livewire.reports.report-ingresos', [
            'clients' => Client::orderBy('nombres', 'asc')->get(),
        ]);
    }

    protected function reporteIngresos()
    {
        $results = Pago::all();

        $this->pagos = $results;
    }
}
