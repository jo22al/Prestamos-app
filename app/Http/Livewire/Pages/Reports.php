<?php

namespace App\Http\Livewire\Pages;

use App\Models\Client;
use App\Models\Pago;
use Carbon\Carbon;
use Livewire\Component;

class Reports extends Component
{
    public string $componentName;
    public float $total;
    public int $clientId;
    public ?string $fromDate = null;
    public ?string $toDate = null;
    public int $items;
    public $pagos;
    public $details;
    public $sale = null;


    public function mount()
    {
        $this->componentName    = 'Reportes de pagos';
        $this->total            = 0;
        $this->clientId         = 0;
        $this->items            = 0;
        $this->pagos             = [];
        $this->details           = [];
    }

    public function render()
    {

        $this->paymentsByDate();

        return view('livewire.reports.reports', [
            'clients' => Client::orderBy('nombres', 'asc')->get(),
        ]);
    }

    protected function paymentsByDate()
    {
        if (!$this->fromDate && strlen($this->fromDate) && !$this->toDate && strlen($this->toDate)) {
            $this->emit('error', "Debe seleccionar fechas validas");
        } else {

            $from = Carbon::parse($this->fromDate)->startOfDay();
            $to   = Carbon::parse($this->toDate)->endOfDay();

            $query = Pago::whereBetween('pagos.created_at', [$from, $to]);
            $query->join('prestamos', 'prestamos.id', '=', 'pagos.id_prestamo');
            $query->join('clients', 'clients.id', '=', 'prestamos.id_client');
            $query->select(
                'clients.nombres as nombres',
                'clients.apellidos as apellidos',
                'prestamos.monto as prestamoMonto',
                'prestamos.saldo as prestamoSaldo',
                'pagos.monto as montoPagado',
                'pagos.fecha_pago as fecha_pago'
            );

            if ($this->clientId) {
                $query->where('pagos.id', $this->clientId);
            }

            $this->pagos = $query->get();
        }
    }

    // public function getDetails(int $saleId = 0)
    // {
    //     $this->sale    = Client::find($saleId);
    //     $this->details = $this->sale->details()->get();
    //     $this->emit('show-modal', 'show modal');
    // }
}
