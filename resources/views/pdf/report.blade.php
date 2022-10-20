<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Reporte de Pagos</title>

    <!-- Styles -->
    <link href="{{ public_path('theme/css/custom_pdf.css') }}" rel="stylesheet" type="text/css" />

    <style>
        .header,
        .footer {
            width: 100%;
        }

        body {
            font-family: 'Helvetica';
            font-size: 9pt;
            color: #111111;
        }

        hr {
            border: 1px solid #dddddd;
            margin-bottom: 0;
        }

        .font-weight-bold {
            font-weight: 700;
        }

        .text-left {
            text-align: left !important;
        }

        .text-center {
            text-align: center !important;
        }

        .text-right {
            text-align: right !important;
        }

        .text-company {
            color: #666666;
            font-size: 9pt;
        }

        .text-primary {
            color: #999999;
            font-weight: bold;
            font-size: 9pt;
        }

        .fs-16 {
            font-size: 16px;
        }

        .fs-18 {
            font-size: 18px;
        }

        .m-180 {
            margin-top: 180px;
        }

        .m-30 {
            margin-top: 30px;
        }

        .text-head {
            font-size: 9pt;
        }

        .table-items thead th {
            font-weight: bold;
            padding: 5px 2px;
            text-align: center;
            vertical-align: middle;
            background-color: #515365;
            color: #ffffff;
        }

        .table-items tbody td {
            padding: 3px 2px;
            vertical-align: top;
            border: 1px solid #eeeeee;
        }

        .table-items>tbody>tr:nth-child(odd) {
            background-color: #f9f9f9;
        }

        .table-items tfoot td {
            padding: 3px 2px;
            vertical-align: middle;
            border: 1px solid #eeeeee;
        }

        .table-secundary td {
            background-color: #F6F6F6;
            border: 1px dotted #D6D6D6;
        }

        .table-footer td {
            background-color: #FCFCFC;
            border: 1px dotted #EEEEEE;
        }

        .watermark {
            position: absolute;
            bottom: 540px;
            left: 100px;
            font-size: 50pt;
            font-weight: bold;
            color: #AAAAAA;
            letter-spacing: 6px;
            opacity: 0.3;
            transform: rotate(-45deg);
        }

        .invoice-logo {
            height: auto;
            width: 100%;
        }

        .invoice-logo-container {
            padding-left: 20%;
            padding-right: 20%;
        }

        .row {
            margin-right: -15px;
            margin-left: -15px;
            width: 100%;
        }

        .col-xs-1,
        .col-xs-2,
        .col-xs-3,
        .col-xs-4,
        .col-xs-5,
        .col-xs-6,
        .col-xs-7,
        .col-xs-8,
        .col-xs-9,
        .col-xs-10,
        .col-xs-11,
        .col-xs-12 {
            position: relative;
            min-height: 1px;
            padding-right: 15px;
            padding-left: 15px;
        }

        .col-xs-1,
        .col-xs-2,
        .col-xs-3,
        .col-xs-4,
        .col-xs-5,
        .col-xs-6,
        .col-xs-7,
        .col-xs-8,
        .col-xs-9,
        .col-xs-10,
        .col-xs-11,
        .col-xs-12 {
            float: left;
        }

        .col-xs-12 {
            width: 100%;
        }

        .col-xs-11 {
            width: 91.66666667%;
        }

        .col-xs-10 {
            width: 83.33333333%;
        }

        .col-xs-9 {
            width: 75%;
        }

        .col-xs-8 {
            width: 66.66666667%;
        }

        .col-xs-7 {
            width: 58.33333333%;
        }

        .col-xs-6 {
            width: 50%;
        }

        .col-xs-5 {
            width: 41.66666667%;
        }

        .col-xs-4 {
            width: 33.33333333%;
        }

        .col-xs-3 {
            width: 25%;
        }

        .col-xs-2 {
            width: 16.66666667%;
        }

        .col-xs-1 {
            width: 8.33333333%;
        }

        .ln_solid {
            border-top: 1px solid #e5e5e5;
            color: #ffffff;
            background-color: #ffffff;
            height: 1px;
            margin: 20px 0
        }

        .x_panel {
            position: relative;
            width: 100%;
            margin-bottom: 10px;
            padding: 10px 17px;
            display: inline-block;
            background: #fff;
            border: 1px solid #E6E9ED;
        }

        .green {
            color: #1ABB9C
        }

        .dark {
            color: #34495E
        }

        .pull-right {
            float: right !important;
        }

        .pull-left {
            float: left !important;
        }

        small {
            font-size: 9pt
        }

        h1 {
            padding-left: 15px;
        }

        .footer {
            bottom: 15px;
            font-size: 7pt;
            color: #333333;
            border-top: 1px solid #1f1f1f;
            z-index: 1000;
        }

        .footer {
            position: fixed;
            left: 0;
            right: 0;
            height: 20px;
            margin-top: -20px;
        }

        .pagenum:before {
            content: counter(page);
        }
    </style>

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
                    Reporte de pagos
                </div>
                <div class="fs-16">
                    Fecha: {{ $from->eq($to) ? $from->format('d/m/Y') : "{$from->format('d/m/Y')} al
                    {$to->format('d/m/Y')}" }}
                </div>
                <div class="fs-16">Usuario: {{ $user }}</div>
            </div>
        </div>
    </div>

    <div class="row m-180">
        <div class="col-xs-12">
            <table cellpadding="0" cellspacing="0" class="table-items" width="100%">
                <thead>
                    <tr>
                        <th width="10%">Nombre</th>
                        <th width="10%">Monto Prestamo</th>
                        <th width="10%">Saldo</th>
                        <th width="10%">Cuota Pagada</th>
                        <th>Fecha de Pago</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pagos as $pago)
                    <tr>
                        <td align="center">{{ $pago->nombres . " " . $pago->apellidos}}</td>
                        <td align="center">{{ $pago->prestamoMonto }}</td>
                        <td align="center">{{ $pago->prestamoSaldo }}</td>
                        <td align="center">{{ $pago->montoPagado }}</td>
                        <td align="center">{{ $pago->fecha_pago }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5">No se ha encontrado ningún registro</td>
                    </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <td class="text-center">
                            <span class="font-weight-bold">
                                TOTALES:
                            </span>
                        </td>
                        <td colspan="1" class="text-center">
                            <span class="font-weight-bold">
                                ${{ number_format($pagos->sum('montoPagado'), 2) }}
                            </span>
                        </td>
                        <td class="text-center">
                            {{ $pagos->sum('prestamoMonto') }}
                        </td>
                        <td colspan="3"></td>
                    </tr>
                </tfoot>
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