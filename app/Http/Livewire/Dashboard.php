<?php

namespace App\Http\Livewire;

use App\Models\Client;
use App\Models\Prestamo;
use App\Models\User;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.dashboard', [
            'prestamos' => Prestamo::all()->count(),
            'users' => User::all()->count(),
            'clients' => Client::all()->count()
        ]);
    }
}