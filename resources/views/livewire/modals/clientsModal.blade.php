<!-- Insert Modal -->
<div wire:ignore.self class="modal fade" id="clientModal" tabindex="-1" aria-labelledby="clientModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="clientModalLabel">Nuevo Cliente</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
          wire:click="closeModal"></button>
      </div>
      <form wire:submit.prevent="saveClient">
        <div class="modal-body">
          <div class="mb-3">
            <label>DPI</label>
            <input type="number" wire:model.lazy="dpi" maxlength="13" class="form-control form-bord">
            @error('dpi')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="row">
            <div class="col-sm mb-3">
              <label>Nombres</label>
              <input type="text" wire:model.lazy="nombres" class="form-control form-bord">
              @error('nombres')
              <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>

            <div class="col-sm mb-3">
              <label>Apellidos</label>
              <input type="text" wire:model.lazy="apellidos" class="form-control form-bord">
              @error('apellidos')
              <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
        </div>
          <div class="mb-3">
            @if ($foto)
            Prev:
            <div>
              <img src="{{ $foto->temporaryUrl() }}" width="100" height="100">
            </div>
            @endif
            <label>Foto</label>
            <input class="form-control form-bord" type="file" wire:model="foto">
            @error('foto')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="mb-3">
            <label>Telefono de trabajo</label>
            <input type="number" wire:model.lazy="telefono_trabajo" class="form-control form-bord">
            @error('telefono_trabajo')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="mb-3">
            <label>Telefono domiciliar</label>
            <input type="number" wire:model.lazy="telefono_domiciliar" class="form-control form-bord">
            @error('telefono_domiciliar')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="mb-3">
            <label>Celular</label>
            <input type="number" wire:model.lazy="celular" class="form-control form-bord">
            @error('celular')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="mb-3">
            <label>Nombre Conyugue</label>
            <input type="text" wire:model.lazy="nombres_conyugue" class="form-control form-bord">
            @error('nombres_conyugue')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="mb-3">
            <label>Apellido Conyugue</label>
            <input type="text" wire:model.lazy="apellidos_conyugue" class="form-control form-bord">
            @error('apellidos_conyugue')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          {{-- <div class="mb-3">
            <label>Alquila</label>
            <input type="text" wire:model.lazy="alquila" class="form-control form-bord">
            @error('alquila')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div> --}}
          <div class="mb-3">
            <label>Lugar de trabajo</label>
            <input type="text" wire:model.lazy="lugar_trabajo" class="form-control form-bord">
            @error('lugar_trabajo')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="mb-3">
            <label>Direccion de trabajo</label>
            <input type="text" wire:model.lazy="direccion_trabajo" class="form-control form-bord">
            @error('direccion_trabajo')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="mb-3">
            <label>Direccion personal</label>
            <input type="text" wire:model.lazy="direccion_personal" class="form-control form-bord">
            @error('direccion_personal')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="mb-3">
            <label>Correo</label>
            <input type="email" wire:model.lazy="correo" class="form-control form-bord">
            @error('correo')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="mb-3">
            <label>Facebook</label>
            <input type="text" wire:model.lazy="facebook" class="form-control form-bord">
            @error('facebook')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="mb-3">
            <label>Referencia Nombres</label>
            <input type="text" wire:model.lazy="referencia_nombres" class="form-control form-bord">
            @error('referencia_nombres')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="mb-3">
            <label>Referencia Apellidos</label>
            <input type="text" wire:model.lazy="referencia_apellidos" class="form-control form-bord">
            @error('referencia_apellidos')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="mb-3">
            <label>Referencia Correo</label>
            <input type="email" wire:model.lazy="referencia_correo" class="form-control form-bord">
            @error('referencia_correo')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="mb-3">
            <label>Referencia telefono</label>
            <input type="number" wire:model.lazy="referencia_telefono" class="form-control form-bord">
            @error('referencia_telefono')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" wire:click="closeModal"
            data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>


<!-- Update Client Modal -->
<div wire:ignore.self class="modal fade" id="updateClientModal" tabindex="-1" aria-labelledby="updateClientModalLabel"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateClientModalLabel">Editar Cliente</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal"
          aria-label="Close"></button>
      </div>
      <form wire:submit.prevent="updateClient">
        <div class="modal-body">
          <div class="mb-3">
            <label>DPI</label>
            <input type="number" wire:model.lazy="dpi" maxlength="13" class="form-control form-bord">
            @error('dpi')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="mb-3">
            <label>Nombres</label>
            <input type="text" wire:model.lazy="nombres" class="form-control form-bord">
            @error('nombres')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="mb-3">
            <label>Apellidos</label>
            <input type="text" wire:model.lazy="apellidos" class="form-control form-bord">
            @error('apellidos')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="mb-3">
            @if ($foto)
            Prev:
            <div>
              <img src="{{ $foto->temporaryUrl() }}" width="100" height="100">
            </div>
            @endif
            <label>Foto</label>
            <input class="form-control form-bord" type="file" wire:model="foto">
            @error('foto')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="mb-3">
            <label>Telefono de trabajo</label>
            <input type="number" wire:model.lazy="telefono_trabajo" class="form-control form-bord">
            @error('telefono_trabajo')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="mb-3">
            <label>Telefono domiciliar</label>
            <input type="number" wire:model.lazy="telefono_domiciliar" class="form-control form-bord">
            @error('telefono_domiciliar')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="mb-3">
            <label>Celular</label>
            <input type="number" wire:model.lazy="celular" class="form-control form-bord">
            @error('celular')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="mb-3">
            <label>Nombre Conyugue</label>
            <input type="text" wire:model.lazy="nombres_conyugue" class="form-control form-bord">
            @error('nombres_conyugue')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="mb-3">
            <label>Apellido Conyugue</label>
            <input type="text" wire:model.lazy="apellidos_conyugue" class="form-control form-bord">
            @error('apellidos_conyugue')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          {{-- <div class="mb-3">
            <label>Alquila</label>
            <input type="text" wire:model.lazy="alquila" class="form-control form-bord">
            @error('alquila')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div> --}}
          <div class="mb-3">
            <label>Lugar de trabajo</label>
            <input type="text" wire:model.lazy="lugar_trabajo" class="form-control form-bord">
            @error('lugar_trabajo')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="mb-3">
            <label>Direccion de trabajo</label>
            <input type="text" wire:model.lazy="direccion_trabajo" class="form-control form-bord">
            @error('direccion_trabajo')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="mb-3">
            <label>Direccion personal</label>
            <input type="text" wire:model.lazy="direccion_personal" class="form-control form-bord">
            @error('direccion_personal')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="mb-3">
            <label>Correo</label>
            <input type="email" wire:model.lazy="correo" class="form-control form-bord">
            @error('correo')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="mb-3">
            <label>Facebook</label>
            <input type="text" wire:model.lazy="facebook" class="form-control form-bord">
            @error('facebook')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="mb-3">
            <label>Referencia Nombres</label>
            <input type="text" wire:model.lazy="referencia_nombres" class="form-control form-bord">
            @error('referencia_nombres')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="mb-3">
            <label>Referencia Apellidos</label>
            <input type="text" wire:model.lazy="referencia_apellidos" class="form-control form-bord">
            @error('referencia_apellidos')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="mb-3">
            <label>Referencia Correo</label>
            <input type="email" wire:model.lazy="referencia_correo" class="form-control form-bord">
            @error('referencia_correo')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="mb-3">
            <label>Referencia telefono</label>
            <input type="number" wire:model.lazy="referencia_telefono" class="form-control form-bord">
            @error('referencia_telefono')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" wire:click="closeModal"
            data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Delete Client Modal -->
<div wire:ignore.self class="modal fade" id="deleteClientModal" tabindex="-1" aria-labelledby="deleteClientModalLabel"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteClientModalLabel">Eliminar Cliente</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal"
          aria-label="Close"></button>
      </div>
      <form wire:submit.prevent="destroyClient">
        <div class="modal-body">
          <h4>¿Está seguro de que quiere eliminar estos datos?</h4>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" wire:click="closeModal"
            data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Sí. Borrar</button>
        </div>
      </form>
    </div>
  </div>
</div>