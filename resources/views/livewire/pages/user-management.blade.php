<div>

    @include('livewire.modals.userModal')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (session()->has('message'))
                <h5 class="alert alert-success">{{ session('message') }}</h5>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>Usuarios
                            <input type="search" wire:model="search" class="form-control float-end mx-2"
                                placeholder="Buscar..." style="width: 230px" />
                            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                                data-bs-target="#userModal">
                                Agregar nuevo usuario
                            </button>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderd table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                    <th>Rol</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->nombre }}</td>
                                    <td>{{ $user->correo }}</td>
                                    <td>{{ $user->roles()->pluck('name')->implode(' ') }}</td>
                                    <td>
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#updateUserModal"
                                            wire:click="editUser({{ $user->id }})" class="btn btn-primary">
                                            Editar
                                        </button>
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#deleteUserModal"
                                            wire:click="deleteUser({{ $user->id }})"
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
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.addEventListener('close-modal', event => {
            const userModal = document.getElementById('userModal');
            const updateUserModal = document.getElementById('updateUserModal');
            const deleteUserModal = document.getElementById('deleteUserModal');

            const modal1 = bootstrap.Modal.getInstance(userModal)
            const modal2 = bootstrap.Modal.getInstance(updateUserModal)
            const modal3 = bootstrap.Modal.getInstance(deleteUserModal)

            if (modal1 != null) modal1.hide();
            if (modal2 != null) modal2.hide();
            if (modal3 != null) modal3.hide();
        })
    </script>
</div>