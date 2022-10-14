<!-- Insert Modal -->
<div wire:ignore.self class="modal fade" id="pagoModal" tabindex="-1" aria-labelledby="pagoModalLabel"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="pagoModalLabel">Registrar Pago</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
          wire:click="closeModal"></button>
      </div>
      <form wire:submit.prevent="savePago">
        <div class="modal-body">

          <div class="col-sm mb-3">
            <label>Prestamo</label>
            <select name="periocidad_pago" wire:model="id_prestamo" class="form-control form-bord">
              <option value=''>--Selecione--</option>
              @foreach ($prestamos as $prestamo)
              <option value={{ $prestamo->id }}>{{ $prestamo->client->nombres . ' ' . $prestamo->client->apellidos }}
              </option>
              @endforeach
            </select>
            @error('id_prestamo')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>

          @if (!is_null($monto))
          <div class="mb-3">
            <label>Cuota</label>
            <input type="number" wire:model.lazy="monto" class="form-control form-bord" readonly>
            @error('monto')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>

          <div class="mb-3">
            <label>Fecha</label>
            <input type="date" wire:model.lazy="fecha_pago" class="form-control form-bord">
            @error('fecha_pago')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>

          <div class="mb-3">
            <label>Tipo de Evidencia</label>
            <input type="text" wire:model.lazy="tipo_de_evidencia" class="form-control form-bord">
            @error('tipo_de_evidencia')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>

          <div class="row">
            <div class="col-sm mb-3">
              <label>Deposito</label>
              <input class="form-control form-bord" type="file" wire:model="img_deposito">
              @error('img_deposito')
              <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="col-sm mb-3">
              @if ($img_deposito)
              <div class="avatar avatar-xl position-relative">
                <img src="{{ $img_deposito->temporaryUrl() }}" class="w-100 border-radius-lg shadow-sm">
              </div>
              @endif
            </div>
          </div>
          @endif


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


{{--
<!-- Update user Modal -->
<div wire:ignore.self class="modal fade" id="updateUserModal" tabindex="-1" aria-labelledby="updateUserModalLabel"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateUserModalLabel">Editar usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal"
          aria-label="Close"></button>
      </div>
      <form wire:submit.prevent="updateUser">
        <div class="modal-body">
          <div class="mb-3">
            <label>Nombre</label>
            <input type="text" wire:model.lazy="nombre" class="form-control form-bord">
            @error('nombre')
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
            <label>Rol</label>
            <select name="role" wire:model="rol" class="form-control form-bord">
              <option value=''>--Seleciona un rol--</option>
              @foreach($roles as $role)
              <option value={{ $role->name }}>{{ $role->name }}</option>
              @endforeach
            </select>
            @error('rol')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="mb-3">
            <label>Contraseña</label>
            <input type="password" wire:model.lazy="password" class="form-control form-bord">
            @error('password')
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

<!-- Delete User Modal -->
<div wire:ignore.self class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteUserModalLabel">Eliminar usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal"
          aria-label="Close"></button>
      </div>
      <form wire:submit.prevent="destroyUser">
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
</div> --}}