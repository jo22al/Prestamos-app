<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Validation\ValidationException;
use Livewire\Component;

class Login extends Component
{

    public $correo='';
    public $password='';

    protected $rules= [
        'correo' => 'required|email',
        'password' => 'required'

    ];

    public function render()
    {
        return view('livewire.auth.login');
    }

    public function mount() {
      
        $this->fill(['correo' => 'admin@example.com', 'password' => '123456789']);    
    }
    
    public function store()
    {
        $attributes = $this->validate();

        if (! auth()->attempt($attributes)) {
            throw ValidationException::withMessages([
                'correo' => 'Revise sus credenciales'
            ]);
        }

        session()->regenerate();

        return redirect('/dashboard');

    }
}
