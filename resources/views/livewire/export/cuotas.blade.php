<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="card-body">
        <table class="table table-borderd table-striped">
            <thead>
                <tr>
                    <th>Fecha de Pago</th>
                    <th>Cuota</th>
                    <th>Interes</th>
                    <th>Total Interes</th>
                    <th>Capital</th>
                    <th>Saldo</th>

                </tr>
            </thead>
            <tbody>
                @forelse ($result as $cuota => $value)
                    <tr>
                        <td>{{ $value->fecha_pago }}</td>
                        <td>{{ $value->monto_couta }}</td>
                        <td>{{ $value->interes }}</td>
                        <td>{{ $value->total_interes }}</td>
                        <td>{{ $value->capital }}</td>
                        <td>{{ $value->saldo }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">No se ha encontrado ningún registro</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>

</html>
