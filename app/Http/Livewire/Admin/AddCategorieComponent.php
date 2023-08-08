<?php

namespace App\Http\Livewire\Admin;

use App\Models\Categorie;
use Illuminate\Support\Str;
use Livewire\Component;

class AddCategorieComponent extends Component
{
    public $name;
    public $slug;
    public $detail;

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

    public function storeCategorie(){

        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'detail' => 'required'
        ]);

        $categorie = new Categorie();
        $categorie->name = $this->name;
        $categorie->slug = $this->slug;
        $categorie->detail = $this->detail;
        $categorie->save();
        session()->flash('message', 'La catégorie a été créée avec succès');
    }
    public function render()
    {
        return view('livewire.admin.add-categorie-component');
    }
}
