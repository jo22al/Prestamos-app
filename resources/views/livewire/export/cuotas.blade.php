<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Reporte de Pagos</title>

    <!-- Styles -->
    <link href="{{ public_path('assets/css/custom_pdf.css') }}" rel="stylesheet" type="text/css" />

    <style>
        .firmas {
            display: inline-block;
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
                    Cliente: {{$client->nombres . ' ' . $client->apellidos}}
                </div>
                <div class="fs-16">Correo: {{$client->correo}} </div>
                <div class="fs-16">Direccion: {{$client->direccion_personal}} </div>
                <div class="fs-16">Telefono: {{ $client->celular }}</div>
                <div class="fs-16">Dpi: {{ $client->dpi }}</div>
            </div>
        </div>
    </div>


    <div class="row m-180">
        <div class="col-xs-12">
            <table cellpadding="0" cellspacing="0" class="table-items" width="100%">
                <thead>
                    <tr>
                        <th width="17%">Fecha de Pago</th>
                        <th width="17%">Cuota</th>
                        <th width="17%">Interes</th>
                        <th width="17%">Total Interes</th>
                        <th width="17%">Capital</th>
                        <th width="15%">Saldo</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($result as $cuota => $value)
                    <tr>
                        <td align="center">{{ $value->fecha_pago }}</td>
                        <td align="center">{{ $value->monto_couta }}</td>
                        <td align="center">{{ $value->interes }}</td>
                        <td align="center">{{ $value->total_interes }}</td>
                        <td align="center">{{ $value->capital }}</td>
                        <td align="center">{{ $value->saldo }}</td>
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

    <div class="m-30"></div>
    <div class="m-30"></div>

    <br>
    <br>
    <br>
    <div class="m-30">
        <div class="m-30">
            <h2 style="margin-top: 25px; margin-bottom: 5px">Primax:</h2>
            <hr style="width:50%;text-align:left;margin-left:0">
        </div>
        <div class="m-30">
            <h2 style="margin-top: 10px; margin-bottom: 5px">Cliente:</h2>
            <hr style="width:50%;text-align:left;margin-left:0">
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