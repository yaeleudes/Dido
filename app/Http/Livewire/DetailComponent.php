<?php

namespace App\Http\Livewire;

use App\Models\Categorie;
use App\Models\Produit;
use Livewire\Component;

class DetailComponent extends Component
{
    public $slug;
    
    public function mount($slug){
        $this->slug = $slug;
    }

    public function render()
    {
        // $produit = Produit::where('slug', $this->slug)->first();
        // $rproduits = Produit::inRandomOrder()->limit(4)->get();
        // $nproduits = Produit::latest()->take(4)->get();
        // $categories = Categorie::select('name')->orderBy('name', 'ASC')->get();
        return view('livewire.detail-component', 
            [
                'produit' => Produit::where('slug', $this->slug)->first(), 
                'rproduits' => Produit::inRandomOrder()->limit(4)->get(), 
                'nproduits' => Produit::latest()->take(4)->get(), 
                'categories' => Categorie::select('name')->orderBy('name', 'ASC')->get()
            ]
        );
    }
}
