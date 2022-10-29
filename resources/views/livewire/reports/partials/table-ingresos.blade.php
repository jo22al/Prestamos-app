<div class="table-responsive">

  <div class="card-body">
    <table class="table table-borderd table-striped">
      <thead>
        <tr>
          <th>Mes</th>
          <th>Capital</th>
          <th>Interes</th>
          <th>Diezmo</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($pagos as $pago)
        <tr>
          <td>{{ $pago->nombres . " " . $pago->apellidos}}</td>
          <td>{{ $pago->prestamoMonto }}</td>
          <td>{{ $pago->prestamoSaldo }}</td>
          <td>{{ $pago->monto }}</td>
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