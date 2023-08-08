<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{route('home.index')}}">Accueil</a>
                    <span></span>   Ajouter un produit
                </div>
            </div>
        </div>

        <section class="mt-50 mb-50 col-md-8 m-auto">
            <div class="container">
                <div class="col-md-12">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                Ajouter un produit
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('fournisseur.produit')}}" class="btn btn-success float-end">Mes produits</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (Session::has('status'))
                            <div class="alert alert-success" role="alert">{{Session::get('status')}}</div>
                        @endif
                        <form wire:submit.prevent="ajouterProduit" class="" enctype="multipart/form-data">
                            <div class="mb-3 mt-3">
                                <label for="name" class="form-label">Nom du produit</label>
                                <input type="text" name="name" id="" class="form-control" placeholder="Entrez le nom de la categorie" wire:model="name" wire:keyup="slug">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="slug" class="form-label">Slug</label>
                                <input type="text" name="slug" id="" class="form-control" placeholder="Entrez le slug" wire:model="slug">
                                @error('slug')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="detail" class="form-label">Detail du produit</label>
                                <input type="text" name="detail" id="" class="form-control" placeholder="Entrez un detail" wire:model="detail">
                                @error('detail')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="description" class="form-label">Description du produit</label>
                                <textarea name="description" id="" cols="30" rows="10" class="form-control" placeholder="Entrez une description" wire:model="description"></textarea>
                                @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="prix" class="form-label">Prix</label>
                                <input type="text" name="prix" id="" class="form-control" placeholder="Entrez le prix du produit" wire:model="prix">
                                @error('prix')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            {{-- <div class="mb-3 mt-3">
                                <label for="sku" class="form-label">SKU</label>
                                <input type="text" name="sku" id="" class="form-control" placeholder="Entrez le SKU du produit" wire:model="sku"> 
                                @error('sku')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div> --}}

                            <div class="mb-3 mt-3">
                                <label for="quantite" class="form-label">Quantité</label>
                                <input type="text" name="quantite" id="" class="form-control" placeholder="Entrez la quantité du produit" wire:model="quantite"> 
                                @error('quantite')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- /////////////////////////////////////////////////////////////////\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ --}}
                            
                            
                            <div class="mb-3 mt-3">
                                <label for="categorie[]" class="form-label">La categorie du produit</label>
                                <select name="categorie[]" id="" class="form-select" wire:model="categorie" multiple>
                                    @foreach ($categories as $categorie)
                                        <option value="{{$categorie->id}}" {{in_array($categorie->id, old('categorie') ?: [])? 'selected' : ''}}>{{$categorie->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3 mt-3">
                                <label for="marque" class="form-label">La marque du produit</label>
                                <select name="marque" id="" class="form-select" wire:model="marque">
                                    <option selected>Selectionnez une marque pour votre produit</option>
                                    @foreach ($marques as $marque)
                                        <option value="{{$marque->id}}">{{$marque->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3 mt-3">
                                <label for="image" class="form-label">Ajouter une image pour ce produit</label>
                                @if ($image)
                                    <img src="" alt="" width="120">
                                @endif
                                <input type="file" name="image" id="" class="form-control border-0" wire:model="image">
                            </div>
                            <div class="row">
                                <div class="col-md- float-end">
                                    <button type="submit" class="btn btn-fill-out submit float-end">Valider</button>
                                    {{-- <button type="reset" class="btn btn-fill-out submit float-end">Annuler</button> --}}
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
