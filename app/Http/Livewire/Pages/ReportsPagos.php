<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use App\Models\Client;
use App\Models\Prestamo;
use Carbon\Carbon;

class ReportsPagos extends Component
{

    public string $componentName;
    public string $typeReportName;
    public float $total;
    public int $clientId;
    public ?string $fromDate = null;
    public ?string $toDate = null;
    public int $items;
    public $pagos;
    public $details;
    public $sale = null;
    public int $tipo_pago;


    public function mount()
    {
        $this->componentName    = 'Reporte de pagos';
        $this->total            = 0;
        $this->clientId         = 0;
        $this->items            = 0;
        $this->tipo_pago        = 0;
        $this->pagos             = [];
        $this->details           = [];
    }

    public function render()
    {

        $this->paymentsByDate();
        return view('livewire.reports.reports-for-time', [
            'clients' => Client::orderBy('nombres', 'asc')->get(),
        ]);
    }

    protected function paymentsByDate()
    {
        $today = Carbon::today()->toDateString();

        $currentWeek = Carbon::today()->addDays(7)->toDateString();
        $pastWeek = Carbon::today()->subDays(7)->toDateString();
        
        if ($this->tipo_pago == 0) {
            $query = Prestamo::where('fecha_pago', '<', '2100-12-12');
            $this->typeReportName = 'Todos los pagos';
        } else if ($this->tipo_pago == 1) {
            $query = Prestamo::whereBetween('fecha_pago', [$today, $currentWeek]);
            $this->typeReportName = 'Pagos de la semana';
        } else if ($this->tipo_pago == 2) {
            $query = Prestamo::whereBetween('fecha_pago', [$today, $pastWeek]);
            $this->typeReportName = 'Pagos de la semana pasada';
        }

        $query->join('clients', 'clients.id', '=', 'prestamos.id_client');
        $query->select(
            'clients.nombres as nombres',
            'clients.apellidos as apellidos',
            'prestamos.monto as prestamoMonto',
            'prestamos.saldo as prestamoSaldo',
            'prestamos.fecha_pago as fecha_pago',
        );

        $this->pagos = $query->orderBy('fecha_pago', 'ASC')->get();

    }
}
