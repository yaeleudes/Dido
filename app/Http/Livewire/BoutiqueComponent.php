<?php

namespace App\Http\Livewire;

use App\Models\Produit;
use Livewire\Component;

class BoutiqueComponent extends Component
{
    public function render()
    {
        $produits = Produit::paginate(12);
        $nproduits = Produit::latest()->take(4)->get();
        return view('livewire.boutique-component', ['produits' => $produits, 'nproduits' => $nproduits]);
    }
}
