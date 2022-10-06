<?php

namespace App\Http\Livewire\Pages;

use App\Models\Client;
use Livewire\Component;

class ShowClient extends Component
{

    public $client;

    public function mount($id)
    {
        $this->client = Client::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.pages.show-client');
    }
}
