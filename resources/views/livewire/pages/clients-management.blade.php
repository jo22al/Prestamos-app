<div>

    @include('livewire.modals.clientsModal')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (session()->has('message'))
                <h5 class="alert alert-success">{{ session('message') }}</h5>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>Clientes
                            <input type="search" wire:model="search" class="form-control float-end mx-2"
                                placeholder="Buscar..." style="width: 230px" />
                            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                                data-bs-target="#clientModal">
                                Agregar nuevo cliente
                            </button>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderd table-striped">
                            <thead>
                                <tr>
                                    <th>DPI</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Celular</th>
                                    <th>Foto</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($clients as $client)
                                <tr>
                                    <td>{{ $client->dpi }}</td>
                                    <td>{{ $client->nombres }}</td>
                                    <td>{{ $client->apellidos }}</td>
                                    <td>{{ $client->celular }}</td>
                                    <td>
                                        <div class="avatar avatar-xl position-relative">
                                            {{-- <img src="/storage/{{$client->foto}}" alt="profile_image" --}}
                                            <img src="{{$client->foto}}" alt="profile_image"
                                            class="w-100 border-radius-lg shadow-sm">
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{ url('/clientes/' . $client->id) }}"
                                            class="btn btn-xs btn-success pull-right">Ver</a>

                                        <button type="button" data-bs-toggle="modal" data-bs-target="#updateClientModal"
                                            wire:click="editClient({{ $client->id }})" class="btn btn-primary">
                                            Editar
                                        </button>
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#deleteClientModal"
                                            wire:click="deleteClient({{ $client->id }})"
                                            class="btn btn-danger">Eliminar</button>
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
                            {{ $clients->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.addEventListener('close-modal', event => {
            const clientModal = document.getElementById('clientModal');
            const updateClientModal = document.getElementById('updateClientModal');
            const deleteClientModal = document.getElementById('deleteClientModal');

            const modal1 = bootstrap.Modal.getInstance(clientModal)
            const modal2 = bootstrap.Modal.getInstance(updateClientModal)
            const modal3 = bootstrap.Modal.getInstance(deleteClientModal)

            if (modal1 != null) modal1.hide();
            if (modal2 != null) modal2.hide();
            if (modal3 != null) modal3.hide();
        })
    </script>
</div>