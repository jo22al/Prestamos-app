<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Reporte de Pagos</title>

    <!-- Styles -->
    <link href="{{ public_path('assets/css/custom_pdf.css') }}" rel="stylesheet" type="text/css" />

</head>

<body>
    <div class="row">
        <div class="col-xs-4">
            <div class="invoice-logo-container">
                <img class="invoice-logo" src="{{ public_path('assets/img/logo-ct.jpg') }}">
            </div>
        </div>
        <div class="col-xs-8">
            <h1 class="font-weight-bold">
                Sistema de Prestamos
            </h1>
            <div class="text-company">
                <div class="font-weight-bold fs-18">
                    Reporte de: {{$typeReportName}}
                </div>
                {{-- <div class="fs-16">
                    Fecha: {{ $from->eq($to) ? $from->format('d/m/Y') : "{$from->format('d/m/Y')} al
                    {$to->format('d/m/Y')}" }}
                </div> --}}
                {{-- <div class="fs-16">Usuario: {{ $user }}</div> --}}
            </div>
        </div>
    </div>

    <div class="row m-180">
        <div class="col-xs-12">
            <table cellpadding="0" cellspacing="0" class="table-items" width="100%">
                <thead>
                    <tr>
                        <th width="20%">Nombre</th>
                        <th width="20%">Monto Prestamo</th>
                        <th width="20%">Saldo</th>
                        <th width="20%">Fecha de Pago</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pagos as $pago)
                    <tr>
                        <td align="center">{{ $pago->nombres . " " . $pago->apellidos}}</td>
                        <td align="center">{{ $pago->prestamoMonto}}</td>
                        <td align="center">{{ $pago->prestamoSaldo }}</td>
                        <td align="center">{{ $pago->fecha_pago }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5">No se ha encontrado ningún registro</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="footer">
        <table cellpadding="0" cellspacing="0" class="table-items" width="100%">
            <tr>
                <td width="20%">
                    <span>Sistema de prestamos</span>
                </td>
                <td width="60%" class="text-center">
                    <span>UMG</span>
                </td>
                <td width="20%" class="text-center">
                    Pagina <span class="pagenum"></span>
                </td>
            </tr>
        </table>
    </div>

</body>

</html>