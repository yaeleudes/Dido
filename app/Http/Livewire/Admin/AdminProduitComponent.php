<?php

namespace App\Http\Livewire\Admin;

use App\Models\Produit;
use Livewire\Component;

class AdminProduitComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.admin-produit-component', 
            [
                'produits' => Produit::with('categories')->orderBy('created_at', 'DESC')->paginate(10)
            ]
        );
    }
}
