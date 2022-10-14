<div class="">
    <!-- Navbar -->
    <!-- End Navbar -->
    <div class="px-2 px-md-4">
        <div class="card card-body mx-3 mx-md-4 mt-105">
            <div class="row gx-4 mb-2">
                <div class="col-auto">
                    <h5>Automovil</h5>
                    <div class="avatar avatar-xl position-relative">
                        <img src="/storage/{{$prestamo->img_auto}}" alt="profile_image"
                            class="w-100 border-radius-lg shadow-sm">
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="row">
                    <div class="col-12 col-xl-6">
                        <div>
                            <h5>Cliente</h5>
                            <p>{{$prestamo->client->nombres . ' ' . $prestamo->client->apellidos}}</p>
                        </div>

                        <div>
                            <h5>Telefono Domiciliar</h5>
                            <p>{{$prestamo->client->telefono_domiciliar}}</p>
                        </div>

                        <div>
                            <h5>Fecha de otorgamiento</h5>
                            <p>{{$prestamo->created_at}}</p>
                        </div>

                        <div>
                            <h5>Monto Inicial</h5>
                            <p>{{$prestamo->monto}}</p>
                        </div>

                        <div>
                            <h5>Saldo</h5>
                            <p>{{$prestamo->saldo}}</p>
                        </div>

                        <div>
                            <h5>Cuota</h5>
                            <p>{{$prestamo->monto_cuota}}</p>
                        </div>

                    </div>
                    <div class="col-12 col-xl-6">


                        <div>
                            <h5>Estado del prestamo</h5>
                            <p>{{$prestamo->estado_prestamo}}</p>
                        </div>

                        <div>
                            <h5>Tipo de interes</h5>
                            <p>{{$prestamo->interes_seleccionado}}</p>
                        </div>

                        <div>
                            <h5>Interes</h5>
                            <p>{{$prestamo->interes}}</p>
                        </div>

                        <div>
                            <h5>Pioricidad</h5>
                            <p>{{$prestamo->periocidad_pago}}</p>
                        </div>

                        <div>
                            <h5>Proxima fecha de pago</h5>
                            <p>{{$prestamo->fecha_pago}}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <h4 class="text-center">Pagos</h4>
                <table class="table table-borderd table-striped">
                    <thead>
                        <tr>
                            <th>Cuota</th>
                            <th>Fecha</th>
                            <th>Saldo Anterior</th>
                            <th>Nuevo Saldo</th>
                            <th>Tipo de evidencia</th>
                            <th>Evidencia</th>

                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($prestamo->pagos as $row)
                        <tr>
                            <td>{{ $row->monto }}</td>
                            <td>{{ $row->fecha_pago }}</td>
                            <td>{{ $row->saldo_anterior }}</td>
                            <td>{{ $row->nuevo_saldo }}</td>
                            <td>{{ $row->tipo_de_evidencia }}</td>
                            <td>
                                <div class="avatar avatar-xl position-relative">
                                    <img src="/storage/{{$row->img_deposito}}" alt="profile_image"
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