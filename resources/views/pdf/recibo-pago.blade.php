<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Recibo </title>

  <style>
    body {
      padding: 50px;
    }

    * {
      box-sizing: border-box;
    }

    .receipt-main {
      display: inline-block;
      width: 100%;
      padding: 15px;
      font-size: 12px;
      border: 1px solid #000;
    }

    .receipt-title {
      text-align: center;
      text-transform: uppercase;
      font-size: 20px;
      font-weight: 600;
      margin: 0;
    }

    .receipt-label {
      font-weight: 600;
    }

    .text-large {
      font-size: 16px;
    }

    .receipt-section {
      margin-top: 10px;
    }

    .receipt-footer {
      text-align: center;
      background: #ff0000;
    }

    .receipt-signature {
      height: 80px;
      margin: 50px 0;
      padding: 0 50px;
      background: #fff;
    }

    .receipt-signature .receipt-line {
      margin-bottom: 10px;
      border-bottom: 1px solid #000;
    }

    .receipt-signature p {
      text-align: center;
      margin: 0;
    }
  </style>

</head>

<body>
  <div class="receipt-main">

    <p class="receipt-title">Recibo de pago</p>

    {{-- <div class="receipt-section pull-left">
      <span class="receipt-label text-large">Número:</span>
      <span class="text-large">1</span>
    </div> --}}

    <div class="clearfix"></div>

    <div class="receipt-section">
      <span class="receipt-label">Fecha:</span>
      <span>{{$fecha}}</span>
    </div>

    <div class="clearfix"></div>

    <div class="receipt-section">
      <span class="receipt-label">Cliente:</span>
      <span>{{$nombres . ' ' . $apellidos}}</span>
    </div>

    <div class="receipt-section">
      <span class="receipt-label">Direccion:</span>
      <span>{{$direccion}}</span>
    </div><br><br><br>

    <div class="pull-right receipt-section">
      <span class="text-large receipt-label">Saldo Anterior</span>
      <span class="text-large">Q. {{$saldoAnterior}}</span>
    </div>

    <div class="pull-right receipt-section">
      <span class="text-large receipt-label">Monto de pago</span>
      <span class="text-large">Q. {{$montoPagado}}</span>
    </div>

    <div class="pull-right receipt-section">
      <span class="text-large receipt-label">Tipo de interes</span>
      <span class="text-large">{{$tipoInteres}}</span>
    </div>

    @if ($tipoInteres == 'PORCENTAJE')
    <div class="pull-right receipt-section">
      <span class="text-large receipt-label">Interes</span>
      <span class="text-large">{{$interes}} %</span>
    </div>
    @else
    <div class="pull-right receipt-section">
      <span class="text-large receipt-label">Interes</span>
      <span class="text-large">{{$interes}}</span>
    </div>
    @endif



    <div class="pull-right receipt-section">
      <span class="text-large receipt-label">Mora</span>
      <span class="text-large">Q. {{$mora}}</span>
    </div>
    <br>
    <br>

    <div class="pull-right receipt-section">
      <span class="text-large receipt-label">Saldo Pendiente</span>
      <span class="text-large">Q. {{$saldoPendiente}}</span>
    </div>

    <br><br><br>
    <div class="clearfix"></div>

    <div class="receipt-signature col-xs-6">
      <p class="receipt-line"></p>
      <p>Primax</p>
      <p>Quetzaltenango, Quetzaltenango</p>
      <p>74857485 - 748574858</p>
    </div>

    <div class="receipt-signature col-xs-6">
      <p class="receipt-line"></p>
      <p>Cliente</p>
    </div>
  </div>

</body>

</html>