<?php

namespace App\Http\Livewire\Pages;

use App\Models\Client;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class ClientsManagement extends Component
{
    use WithPagination;
    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    public $dpi, $nombres, $apellidos, $telefono_trabajo, $telefono_domiciliar,
        $celular, $nombres_conyugue, $apellidos_conyugue, $alquila, $lugar_trabajo,
        $direccion_trabajo, $direccion_personal, $correo, $facebook, $foto,
        $referencia_nombres, $referencia_apellidos, $referencia_correo, $referencia_telefono;

    public $search = '';

    protected function rules()
    {
        return [
            'dpi' => 'required|numeric',
            'nombres' => 'required|string',
            'apellidos' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png',
            'telefono_trabajo' => 'required|numeric|min:8',
            'telefono_domiciliar' => 'required|numeric|min:8',
            'celular' => 'required|numeric|min:8',
            'nombres_conyugue' => '',
            'apellidos_conyugue' => '',
            // 'alquila' => 'required|string',
            'lugar_trabajo' => 'required|string',
            'direccion_trabajo' => 'required|string',
            'direccion_personal' => 'required|string',
            'correo' => 'required|string|email',
            'facebook' => 'string',
            'referencia_nombres' => 'required|string',
            'referencia_apellidos' => 'required|string',
            'referencia_correo' => 'required|string',
            'referencia_telefono' => 'required|numeric|min:8',
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function saveClient()
    {
        $validatedData = $this->validate();

        if (!empty($validatedData['foto'])) {
            $validatedData['foto'] = $this->foto->store('fotos', 'public');
        }
        Client::create($validatedData);
        session()->flash('message', 'Cliente creado correctamente');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function editClient(int $client_id)
    {
        $client = Client::find($client_id);
        if ($client) {
            $this->client_id = $client->id;
            $this->dpi = $client->dpi;
            $this->nombres = $client->nombres;
            $this->apellidos = $client->apellidos;
            // $this->foto = $client->foto;
            $this->telefono_trabajo = $client->telefono_trabajo;
            $this->telefono_domiciliar = $client->telefono_domiciliar;
            $this->celular = $client->celular;
            $this->nombres_conyugue = $client->nombres_conyugue;
            $this->apellidos_conyugue = $client->apellidos_conyugue;
            $this->lugar_trabajo = $client->lugar_trabajo;
            $this->direccion_trabajo = $client->direccion_trabajo;
            $this->direccion_personal = $client->direccion_personal;
            $this->correo = $client->correo;
            $this->facebook = $client->facebook;
            $this->referencia_nombres = $client->referencia_nombres;
            $this->referencia_apellidos = $client->referencia_apellidos;
            $this->referencia_correo = $client->referencia_correo;
            $this->referencia_telefono = $client->referencia_telefono;
        } else {
            return redirect()->to('/clientes');
        }
    }

    public function updateClient()
    {
        $validatedData = $this->validate();

        if (!empty($validatedData['foto'])) {
            $validatedData['foto'] = $this->foto->store('fotos', 'public');
        }
        Client::where('id', $this->client_id)->update($validatedData);
        session()->flash('message', 'Cliente actualizado correctamente');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function deleteClient(int $client_id)
    {
        $this->client_id = $client_id;
    }

    public function destroyClient()
    {
        Client::find($this->client_id)->delete();
        session()->flash('message', 'Usuario eliminado correctamente');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->client_id = '';
        $this->dpi = '';
        $this->nombres = '';
        $this->apellidos = '';
        // $this->foto = $client->foto;
        $this->telefono_trabajo = '';
        $this->telefono_domiciliar = '';
        $this->celular = '';
        $this->nombres_conyugue = '';
        $this->apellidos_conyugue = '';
        $this->lugar_trabajo = '';
        $this->direccion_trabajo = '';
        $this->direccion_personal = '';
        $this->correo = '';
        $this->facebook = '';
        $this->referencia_nombres = '';
        $this->referencia_apellidos = '';
        $this->referencia_correo = '';
        $this->referencia_telefono = '';
    }

    public function render()
    {
        $clients = Client::where('nombres', 'like', '%' . $this->search . '%')->orderBy('id', 'ASC')->paginate(8);
        return view('livewire.pages.clients-management', ['clients' => $clients]);
    }
}
