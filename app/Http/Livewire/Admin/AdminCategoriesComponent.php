<?php

namespace App\Http\Livewire\Admin;

use App\Models\Categorie;
use Livewire\Component;

class AdminCategoriesComponent extends Component
{
    public function modifier($categorie_id){
        // $id = $categorie_id;
        return view('livewire.update-categorie-component', ['categorie_id' => $categorie_id]);
    }

    public function supprimer($categorie_id){
        $categorie = Categorie::find($categorie_id);
        $categorie->delete();
    }
    public function render()
    {
        $categories = Categorie::orderBy('id', 'ASC')->paginate(10);
        return view('livewire.admin.admin-categories-component', ['categories' => $categories]);
    }
}
