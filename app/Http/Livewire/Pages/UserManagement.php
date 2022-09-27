<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class UserManagement extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $nombre, $correo, $rol, $password, $user_id;
    public $search = '';

    protected function rules()
    {
        return [
            'nombre' => 'required|string|min:6',
            'correo' => 'required|email|unique:users,correo',
            'rol' => 'required|string',
            'password' => 'required|min:5',
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function saveUser()
    {
        $validatedData = $this->validate();

        $user = User::create([
            'nombre' => $validatedData['nombre'],
            'correo' => $validatedData['correo'],
            'password' => $validatedData['password'],
        ]);
        $user->assignRole($validatedData['rol']);
        session()->flash('message', 'Usuario creado correctamente');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function editUser(int $user_id)
    {
        $user = User::find($user_id);
        if ($user) {
            $this->user_id = $user->id;
            $this->nombre = $user->nombre;
            $this->correo = $user->correo;
            $this->password = $user->password;
        } else {
            return redirect()->to('/usuarios');
        }
    }

    public function updateUser()
    {
        // $validatedData = $this->validate();
        $validatedData = $this->validate([
            'nombre' => 'required|string|min:6',
            'correo' => 'required|email',
            'rol' => 'required|string',
            'password' => 'required|min:5',
        ]);
        
        User::where('id', $this->user_id)->update([
            'nombre' => $validatedData['nombre'],
            'correo' => $validatedData['correo'],
            'password' => $validatedData['password'],
        ]);
        session()->flash('message', 'Usuario actualizado correctamente');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function deleteUser(int $user_id)
    {
        $this->user_id = $user_id;
    }

    public function destroyUser()
    {
        User::find($this->user_id)->delete();
        session()->flash('message', 'Usuario eliminado correctamente');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->nombre = '';
        $this->correo = '';
        $this->rol = '';
        $this->password = '';
    }

    public function render()
    {
        $users = User::where('nombre', 'like', '%' . $this->search . '%')->orderBy('id', 'ASC')->paginate(8);
        $users->makeHidden(['password']);
        // $this->password = '';
        return view('livewire.pages.user-management', ['users' => $users]);
    }
}
