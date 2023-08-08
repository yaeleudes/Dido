<?php

namespace App\Http\Livewire;

use App\Models\Produit;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class VendeurProduitComponent extends Component{
    public function modifier(){
        // $produit = Produit::find($produit_id);
        
        return view('produit-edit');
    }

    public function render(){
        $id = Auth::user()->id;
        $produits = Produit::with('categories')->orderBy('created_at', 'DESC')->where('user_id', '=', $id)->paginate(10);
        return view('livewire.vendeur-produit-component', ['produits' => $produits]);
    }
}
