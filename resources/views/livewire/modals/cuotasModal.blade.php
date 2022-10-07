<!-- Insert Modal -->
<div wire:ignore.self class="modal fade" id="cuotasModal" tabindex="-1" aria-labelledby="cuotasModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cuotasModalLabel">Cuotas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
          wire:click="closeModal"></button>
      </div>
      <div class="modal-footer">


        {{-- <h3>{{$cuotas}}</h3> --}}
        <button type="button" class="btn btn-secondary" wire:click="closeModal" data-bs-dismiss="modal">Cerrar</button>

      </div>
      </form>
    </div>
  </div>
</div>