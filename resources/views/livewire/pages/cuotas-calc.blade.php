<div class="">

    @include('livewire.modals.cuotasModal')

    <div class="px-2 px-md-4">
        <div class="card card-body mx-3 mx-md-4 mt-105">
            <div class="row">
                <div class="col-12 col-xl-8 col-lg-12">
                    <div class="card card-plain h-100">
                        <div class="card-header pb-0 p-3">
                            <h6 class="mb-0">Calculo de cuotas</h6>
                        </div>
                        <div class="card-body p-3">
                            <form wire:submit.prevent="savePrestamo">
                                <div class="modal-body">

                                    <div class="row">
                                        <div class="col-sm mb-3">
                                            <label>Monto</label>
                                            <input type="number" wire:model.lazy="monto" class="form-control form-bord">
                                            @error('monto')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-sm mb-3">
                                            <label>Monto Cuota</label>
                                            <input type="number" wire:model.lazy="monto_cuota"
                                                class="form-control form-bord">
                                            @error('monto_cuota')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm mb-3">
                                            <label>Tipo de Interes</label>
                                            <select name="selectedInteres" wire:model="selectedInteres"
                                                class="form-control form-bord">
                                                <option value=''>--Selecione--</option>
                                                @foreach ($intereses as $interes)
                                                <option value={{ $interes }}>{{ $interes }}</option>
                                                @endforeach
                                            </select>
                                            @error('selectedInteres')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        @if ($selectedInteres == 'PORCENTAJE')
                                        <div class="col-sm mb-3">
                                            <label>Interes</label>
                                            <select name="porcentaje" wire:model="porcentaje"
                                                class="form-control form-bord">
                                                <option value=''>--Selecione--</option>
                                                @foreach ($porcentajes as $porcentaje)
                                                <option value={{ $porcentaje }}>{{ $porcentaje }}</option>
                                                @endforeach
                                            </select>
                                            @error('porcentaje')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        @endif

                                        @if ($selectedInteres == 'FIJO')
                                        <div class="col-sm mb-3">
                                            <div class="col-sm mb-3">
                                                <label>Interes</label>
                                                <input type="number" wire:model.lazy="porcentaje"
                                                    class="form-control form-bord">
                                                @error('porcentaje')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        @endif
                                    </div>

                                    <div class="mb-3">
                                        <label>Fecha de pago</label>
                                        <input type="date" wire:model.lazy="fecha_pago" class="form-control form-bord">
                                        @error('fecha_pago')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        <div class="col-sm mb-3">
                                            <label>Cliente</label>
                                            <select name="id_client" wire:model="id_client"
                                                class="form-control form-bord">
                                                <option value=''>--Selecione--</option>
                                                @foreach ($clients as $client)
                                                <option value={{ $client->id }}>
                                                    {{ $client->nombres . ' ' . $client->apellidos }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('id_client')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-sm mb-3">
                                            <label>Periocidad de pago</label>
                                            <select name="periocidad_pago" wire:model="periocidad_pago"
                                                class="form-control form-bord">
                                                <option value=''>--Selecione--</option>
                                                @foreach ($periodicidades as $periocidad)
                                                <option value={{ $periocidad }}>{{ $periocidad }}</option>
                                                @endforeach
                                            </select>
                                            @error('periocidad_pago')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm mb-3">
                                            <label>Fotografía del Automovil</label>
                                            <input class="form-control form-bord" type="file" wire:model="img_auto">
                                            @error('img_auto')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-sm mb-3">
                                            @if ($img_auto)
                                            <div class="avatar avatar-xl position-relative">
                                                <img src="{{ $img_auto->temporaryUrl() }}"
                                                    class="w-100 border-radius-lg shadow-sm">
                                            </div>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" wire:click="calcularCuotas()"
                                        data-bs-toggle="modal" data-bs-target="#cuotasModal">Calcular
                                        Cuotas</button>

                                    <button type="submit" class="btn btn-success">Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.addEventListener('close-modal', event => {
            const cuotasModal = document.getElementById('cuotasModal');
            const modal1 = bootstrap.Modal.getInstance(cuotasModal)
            if (modal1 != null) modal1.hide();
        })
    </script>
</div>