<?php

namespace App\Http\Livewire;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Livewire\Component;

class UpdateCategorieComponent extends Component
{

    public $categorie_id;
    public $name;
    public $slug;
    public $detail;

    public function mount($categorie_id){
        $categorie = Categorie::find($categorie_id);
        $this->categorie_id = $categorie->id;
        $this->name = $categorie->name;
        $this->slug = $categorie->slug;
        $this->detail = $categorie->detail;
    }

    public function slug(){
        $this->slug = Str::slug($this->name);
    }

    public function update($champs){
        $this->validateOnly($champs, [
            'name' => 'required',
            'slug' => 'required',
            'detail' => 'required'
        ]);
    }

    public function updateCategorie(){

        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'detail' => 'required'
        ]);

        $categorie =Categorie::find($this->categorie_id);
        $categorie->name = $this->name;
        $categorie->slug = $this->slug;
        $categorie->detail = $this->detail;

        $categorie->save();

        session()->flash('message', 'La catégorie a été modifiée avec succès!');
    }

    public function render()
    {
        return view('livewire.update-categorie-component');
    }
}
