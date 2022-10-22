<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use App\Models\Client;
use App\Models\Pago;
use App\Models\Prestamo;

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
            $query->where('prestamos.id', $clientId);
            $user = Client::find($clientId)->nombres;
        }

        $pagos = $query->get();

        $pdf = Pdf::loadView(
            'pdf.report',
            compact('pagos', 'user', 'from', 'to')
        );

        return $pdf->stream('reportePagos.pdf');
    }

    public function reportPdfPagos(int $tipo_pago, String $typeReportName)
    {
        $today = Carbon::today()->toDateString();
        $pagos = [];

        if ($tipo_pago == 0) {
            $query = Prestamo::where('fecha_pago', '<', '2100-12-12');
        } else if ($tipo_pago == 1) {
            $query = Prestamo::where('fecha_pago', '>=', $today);
        } else if ($tipo_pago == 2) {
            $query = Prestamo::where('fecha_pago', '<', $today);
        }

        $query->join('clients', 'clients.id', '=', 'prestamos.id_client');
        $query->select(
            'clients.nombres as nombres',
            'clients.apellidos as apellidos',
            'prestamos.monto as prestamoMonto',
            'prestamos.saldo as prestamoSaldo',
            'prestamos.fecha_pago as fecha_pago',
        );

        $pagos = $query->orderBy('fecha_pago', 'ASC')->get();

        $pdf = Pdf::loadView(
            'pdf.report-pagos',
            compact('pagos', 'typeReportName')
        );

        return $pdf->stream('reportePagos2.pdf');
    }


    protected function stringToCarbon(?string $date = null)
    {
        if (!$date && strlen($date)) {
            return Carbon::now();
        }

        return Carbon::parse($date);
    }
}
