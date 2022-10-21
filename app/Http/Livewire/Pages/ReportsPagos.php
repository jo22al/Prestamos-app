<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use App\Models\Client;
use App\Models\Pago;
use App\Models\Prestamo;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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

        if ($this->tipo_pago == 0) {
            $query = Prestamo::where('fecha_pago', '<', '2100-12-12');
            $query->join('clients', 'clients.id', '=', 'prestamos.id_client');
            $query->select(
                'clients.nombres as nombres',
                'clients.apellidos as apellidos',
                'prestamos.monto as prestamoMonto',
                'prestamos.saldo as prestamoSaldo',
                'prestamos.fecha_pago as fecha_pago',
            );
            $this->typeReportName = 'Todos los pagos';
            $this->pagos = $query->orderBy('fecha_pago', 'ASC')->get();
        } else if ($this->tipo_pago == 1) {
            $query = Prestamo::where('fecha_pago', '>=', $today);
            $query->join('clients', 'clients.id', '=', 'prestamos.id_client');
            $query->select(
                'clients.nombres as nombres',
                'clients.apellidos as apellidos',
                'prestamos.monto as prestamoMonto',
                'prestamos.saldo as prestamoSaldo',
                'prestamos.fecha_pago as fecha_pago',
            );
            $this->typeReportName = 'Proximos pagos';
            $this->pagos = $query->orderBy('fecha_pago', 'ASC')->get();
        } else if ($this->tipo_pago == 2) {
            $query = Prestamo::where('fecha_pago', '<', $today);
            $query->join('clients', 'clients.id', '=', 'prestamos.id_client');
            $query->select(
                'clients.nombres as nombres',
                'clients.apellidos as apellidos',
                'prestamos.monto as prestamoMonto',
                'prestamos.saldo as prestamoSaldo',
                'prestamos.fecha_pago as fecha_pago',
            );
            $this->typeReportName = 'Pagos retrasados';
            $this->pagos = $query->orderBy('fecha_pago', 'ASC')->get();
        }
    }
}
