<?php

namespace App\Http\Livewire\Admin;

use App\Models\Categorie;
use App\Models\Marque;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Http\UploadedFile;

class AddProduitComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $detail;
    public $description;
    public $prix;
    public $sku;
    public $quantite;
    public $categorie;
    public $marque;
    public $image;

    public function slug(){
        $this->slug = Str::slug($this->name);
    }

    public function ajouterProduit(Request $request){
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'detail' => 'required',
            'description' => 'required',
            'prix' => 'required|numeric',
            // 'sku' => 'required',
            'quantite' => 'required',
            'image' => ['image', 'max:2000']
        ]);

        
        $produit = new Produit();

        $produit->name = $this->name;
        $produit->slug = $this->slug;
        $produit->detail = $this->detail;
        $produit->description = $this->description;
        $produit->prix = $this->prix;
        $produit->sku = 'PRD-'.$this->slug.Auth::user()->id;
        $produit->quantite = $this->quantite;
        $produit->stock_etat = ($this->quantite >= 10) ? 'en stock' : 'rupture de stock';
        $produit->image = 'null';
        $produit->user_id = Auth::user()->id;
        $produit->marque_id = $this->marque;

        $image_name = time().'-'.$this->image->getClientOriginalName();
        $produit->image = $this->image->storeAs('produits', $image_name, 'my_public_path');
        // $image = $this->image->storeAs('produits_images', $produit->image, 'public');
        
        // dd($produit->image);
        $imagePath = asset('uploads/images'.$produit->image);

       
        // dd($produit->image );
        
        $produit->save();

        $produit->categories()->sync($this->categorie);

        return redirect()->route('fournisseur.produit')->with('status', 'Le produit a été ajouté!');
        // session()->flash('status', 'Le produit a bien été ajpouté!');
    }
    public function render()
    {
        $produit = Produit::find(1);

        // dd($produit->categories);
        // $produit->categories()->createMany([
        //     [
        //         'name' => 'cate', 
        //         'slug' => 'cate'
        //     ],
        //     [
        //         'name' => 'cater', 
        //         'slug' => 'cater'
        //     ]
        // ]);

        $categories = Categorie::select('id', 'name')->orderBy('name', 'ASC')->get();
        $marques = Marque::select('id', 'name')->orderBy('name', 'ASC')->get();
        return view('livewire.admin.add-produit-component', ['categories' => $categories, 'marques' => $marques]);
    }
}
