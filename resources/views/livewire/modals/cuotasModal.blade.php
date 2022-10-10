<!-- Insert Modal -->
<div wire:ignore.self class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="cuotasModal" tabindex="-1" aria-labelledby="cuotasModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cuotasModalLabel">Cuotas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    wire:click="closeModal"></button>
            </div>
            <div class="modal-footer">

                @if (!is_null($cuotas))
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
                                @forelse ($cuotas as $cuota => $value)
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
                @endif

                <button type="button" class="btn btn-secondary" wire:click="closeModal"
                    data-bs-dismiss="modal">Cerrar</button>

            </div>
        </div>
    </div>
</div>
