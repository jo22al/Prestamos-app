<div class="table-responsive">

    <div class="card-body">
        <table class="table table-borderd table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Monto Prestamo</th>
                    <th>Saldo</th>
                    <th>Cuota Pagada</th>
                    <th>Fecha de Pago</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pagos as $pago)
                <tr>
                    <td>{{ $pago->nombres . " " . $pago->apellidos}}</td>
                    <td>{{ $pago->prestamoMonto }}</td>
                    <td>{{ $pago->prestamoSaldo }}</td>
                    <td>{{ $pago->montoPagado }}</td>
                    <td>{{ $pago->fecha_pago }}</td>
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