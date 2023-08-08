<?php

namespace App\Http\Livewire;

use App\Models\Categorie;
use App\Models\Produit;
use Livewire\Component;

class AccueilComponent extends Component
{
    public function render()
    {
        return view('livewire.accueil-component',
        [
            'produits' => Produit::with('categories')->orderBy('created_at', 'ASC')->get(),
            'nproduits' => Produit::with('categories')->orderByDesc('created_at'),
            'categories' => Categorie::orderBy('name', 'ASC')->get()
        ]
    
        );
    }
}
