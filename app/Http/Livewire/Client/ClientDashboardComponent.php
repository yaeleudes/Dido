<?php

namespace App\Http\Livewire\Client;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ClientDashboardComponent extends Component
{
    public $name;
    public $nickname;
    public $telephone;
    public $ville;
    public $commune;
    public $email;

    public function mount(){
        $client = User::find(Auth::user()->id);
        $this->name = $client->name;
        $this->nickname = $client->nickname;
        $this->telephone = $client->telephone;
        $this->ville = $client->ville;
        $this->commune = $client->commune;
        $this->email = $client->email;
    }

    public function update($champs){
        $this->validateOnly($champs, [
            'name' => 'required',
            'nickname' => 'required',
            'telephone' => 'required',
            'ville' => 'required',
            'commune' => 'required',
            'email' => 'email'
        ]);
    }

    public function updateAdresse(){
        $this->validate([
            'ville' => 'required',
            'commune' => 'required',
        ]);

        $client = User::find(Auth::user()->id);

        $client->ville = $this->ville;
        $client->commune = $this->commune;

        $client->save();

        session()->flash('status', 'Votre profile a été bien modifié!');;
    }

    public function updateDetail(){
        $this->validate([
            'name' => 'required',
            'nickname' => 'required',
            'telephone' => 'required',
            'ville' => 'required',
            'commune' => 'required',
            'email' => 'email'
        ]);

        $client = User::find(Auth::user()->id);

        $client->name = $this->name;
        $client->nickname = $this->nickname;
        $client->telephone = $this->telephone;
        $client->email = $this->email;
        
        $client->save();

        session()->flash('status', 'Votre profile a été bien modifié!');
    }
    
    public function render()
    {
        $client = Auth::user();
        return view('livewire.client.client-dashboard-component', ['client' => $client]);
    }
}
