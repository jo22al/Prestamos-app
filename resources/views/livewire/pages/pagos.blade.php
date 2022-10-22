<div>

    @include('livewire.modals.pagoModal')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (session()->has('message'))
                <h5 class="alert alert-success">{{ session('message') }}</h5>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>Pagos
                            <input type="search" wire:model="search" class="form-control float-end mx-2"
                                placeholder="Buscar..." style="width: 230px" />
                            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                                data-bs-target="#pagoModal">
                                Agregar Pago
                            </button>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderd table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Id prestamo</th>
                                    <th>Monto</th>
                                    <th>Fecha de pago</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pagos as $pago)
                                <tr>
                                    <td>{{ $pago->id }}</td>
                                    <td>{{ $pago->id_prestamo }}</td>
                                    <td>{{ $pago->monto }}</td>
                                    <td>{{ $pago->fecha_pago }}</td>
                                    <td>
                                        <div class="avatar avatar-xl position-relative">
                                            <img src="/storage/{{$pago->img_deposito}}" alt="profile_image" <img
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
                        <div>
                            {{ $pagos->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.addEventListener('close-modal', event => {
            const pagoModal = document.getElementById('pagoModal');
            const modal1 = bootstrap.Modal.getInstance(pagoModal)
            if (modal1 != null) modal1.hide();
        })

        window.addEventListener('load-select', event => {
            $('#select2').select2();
            $('#select2').on('change', function() {
                @this.set('id_prestamo', this.value)
            });
        })
    </script>


    <script>
        document.addEventListener('livewire:load', function() {
        $('#select2').select2();
        $('#select2').on('change', function() {
            @this.set('id_prestamo', this.value)
        });
    })
    </script>
</div>