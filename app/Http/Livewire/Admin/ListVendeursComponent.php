<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Foundation\Auth\User;
use Livewire\Component;

class ListVendeursComponent extends Component
{
    public function autorise($user_id){
        $vendeur = User::find($user_id);
        $vendeur->etat = 'autorise';
        $vendeur->save();
    }

    public function bloque($user_id){
        $vendeur = User::find($user_id);
        $vendeur->etat = 'bloque';
        $vendeur->save();
    }
    
    public function render()
    {
        $vendeurs = User::where('utype', '=', 'ADM')->paginate(10);
        return view('livewire.admin.list-vendeurs-component', ['vendeurs' => $vendeurs]);
    }
}
