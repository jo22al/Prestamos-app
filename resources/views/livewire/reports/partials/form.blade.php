<div class="row">
    <div class="col-12">
        <div class="h6">Elije el Cliente</div>
        <div class="form-group">
            <select class="form-control form-bord" wire:model.lazy="clientId">
                <option value="0">Todos</option>
                @foreach($clients as $client)
                <option value="{{ $client->id }}">{{ $client->nombres . " " . $client->apellidos }}</option>
                @endforeach
            </select>
        </div>

        {{-- <div>
            <div class="col-sm mb-3" wire:ignore>
                <select id="select2" name="id_client" wire:model="id_client" class="form-control form-bord">
                    <option value=0>Todos</option>
                    @foreach ($clients as $client)
                    <option value={{ $client->id }}>
                        {{ $client->nombres . ' ' . $client->apellidos }}
                    </option>
                    @endforeach
                </select>
            </div>
        </div> --}}
    </div>

    <div class="col-12">
        <div class="h6">Fecha desde</div>
        <input class="form-control form-bord" type="date" wire:model.lazy="fromDate" placeholder="Click para elejir">
    </div>

    <div class="col-12">
        <div class="h6">Fecha hasta</div>
        <input class="form-control form-bord" type="date" wire:model.lazy="toDate" placeholder="Click para elejir">
    </div>

    <div class="container mt-2">
        <div class="row">
            <button class=" col btn full-width btn-dark btn-block" type="button" wire:click.prevent="$refresh">
                Consultar
            </button>
        </div>
        <div class="row">
            <a href="{{ url("reports/pdf/$clientId/$fromDate/$toDate") }}"
                class="col btn full-width btn-dark btn-block{{ !$pagos->count() ? ' disabled' : '' }}" target="_blank">
                Generar PDF
            </a>
        </div>
    </div>

    <script>
        document.addEventListener('livewire:load', function() {
        $('#select2').select2();
        $('#select2').on('change', function() {
            @this.set('clientId', this.value)
        });
    })
    </script>
</div>