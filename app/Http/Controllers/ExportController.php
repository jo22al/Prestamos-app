<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use App\Models\Client;
use App\Models\Pago;

class ExportController extends Controller
{

    public function reportPdf(int $clientId, string $fromDate = null, string $toDate = null)
    {
        $pagos = [];

        $from = $this->stringToCarbon($fromDate)->startOfDay();
        $to   = $this->stringToCarbon($toDate)->endOfDay();
        $user = 'Todos';

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

        if ($clientId) {
            $query->where('pagos.id', $clientId);
            $user = Client::find($clientId)->nombres;
        }

        $pagos = $query->get();

        $pdf = Pdf::loadView(
            'pdf.report',
            compact('pagos', 'user', 'from', 'to')
        );

        return $pdf->stream('reportePagos.pdf');
    }


    protected function stringToCarbon(?string $date = null)
    {
        if (!$date && strlen($date)) {
            return Carbon::now();
        }

        return Carbon::parse($date);
    }
}
