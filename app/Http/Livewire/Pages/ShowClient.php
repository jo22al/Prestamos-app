<?php

namespace App\Http\Livewire\Pages;

use App\Models\Client;
use Livewire\Component;

class ShowClient extends Component
{

    public $client;

    public function mount($id)
    {
        $client = Client::findOrFail($id);
        $this->client = $client;
    }

    public function render()
    {
        return view('livewire.pages.show-client');
    }
}
