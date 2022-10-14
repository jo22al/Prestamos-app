<div class="">
    <!-- Navbar -->
    <!-- End Navbar -->
    <div class="px-2 px-md-4">
        <div class="card card-body mx-3 mx-md-4 mt-105">
            <div class="row gx-4 mb-2">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        <img src="/storage/{{$client->foto}}" alt="profile_image"
                            class="w-100 border-radius-lg shadow-sm">
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            {{$client->nombres . ' ' . $client->apellidos}}
                        </h5>
                        <p class="mb-0 font-weight-normal text-sm">
                            {{$client->correo}}
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="row">
                    <div class="col-12 col-xl-6">
                        <div class="card card-plain h-100">

                        </div>
                        <div class="col-12 col-xl-6">

                        </div>
                    </div>
                </div>

                <div>
                    <h4 class="text-center">Prestamos Solicitados</h4>
                    <table class="table table-borderd table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Monto</th>
                                <th>Cuota</th>
                                <th>Tipo de interes</th>
                                <th>Interes</th>
                                <th>Saldo</th>
                                <th>Periodicidad</th>
                                <th>Automovil</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($client->prestamos as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->monto }}</td>
                                <td>{{ $row->monto_cuota }}</td>
                                <td>{{ $row->interes_seleccionado }}</td>
                                <td>{{ $row->interes }}</td>
                                <td>{{ $row->saldo }}</td>
                                <td>{{ $row->periocidad_pago }}</td>
                                <td>
                                    <div class="avatar avatar-xl position-relative">
                                        <img src="/storage/{{$row->img_auto}}" alt="profile_image"
                                            class="w-100 border-radius-lg shadow-sm">
                                    </div>
                                </td>
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
        </div>
    </div>