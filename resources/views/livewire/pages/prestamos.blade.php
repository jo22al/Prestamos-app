<div>


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (session()->has('message'))
                <h5 class="alert alert-success">{{ session('message') }}</h5>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>Prestamos
                            <input type="search" wire:model="search" class="form-control float-end mx-2"
                                placeholder="Buscar..." style="width: 230px" />
                            {{-- <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                                data-bs-target="#clientModal">
                                Agregar nuevo cliente
                            </button> --}}
                            <a href="{{ url('/cuotas') }}" class="btn btn-primary float-end">Nuevo Prestamo</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderd table-striped">
                            <thead>
                                <tr>
                                    <th>Cliente</th>
                                    <th>Monto</th>
                                    <th>Cuota</th>
                                    <th>Interes</th>
                                    <th>Fecha de pago</th>
                                    <th>Saldo</th>
                                    <th>Auto</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($prestamos as $prestamo)
                                <tr>
                                    <td>{{ $prestamo->client->nombres . ' ' . $prestamo->client->apellidos}}</td>
                                    <td>{{ $prestamo->monto }}</td>
                                    <td>{{ $prestamo->monto_cuota }}</td>
                                    <td>{{ $prestamo->interes }}</td>
                                    <td>{{ $prestamo->fecha_pago }}</td>
                                    <td>{{ $prestamo->saldo }}</td>
                                    <td>
                                        <div class="avatar avatar-xl position-relative">
                                            <img src="/storage/{{$prestamo->img_auto}}" alt="profile_image" <img
                                                class="w-100 border-radius-lg shadow-sm">
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{ url('/prestamos/' . $prestamo->id) }}"
                                            class="btn btn-xs btn-success pull-right">Detalles</a>

                                        {{-- <a href="{{ url('/cuotas/' . $prestamo->id) }}"
                                            class="btn btn-xs btn-success pull-right">Ver</a>

                                        <button type="button" data-bs-toggle="modal" data-bs-target="#updateClientModal"
                                            wire:click="editClient({{ $client->id }})" class="btn btn-primary">
                                            Editar
                                        </button>
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#deleteClientModal"
                                            wire:click="deleteClient({{ $client->id }})"
                                            class="btn btn-danger">Eliminar</button> --}}
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5">No se ha encontrado ningún registro</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div>
                            {{ $prestamos->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>