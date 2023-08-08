<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{route('home.index')}}">Accueil</a>
                    <span></span>   Mes Produits
                </div>
            </div>
        </div>

        <section class="mt-50 mb-50">
            <div class="container">
                <div class="col-md-12">
                    <div class="card-header">
                        Mes Produits
                        <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-6">
                                <a href="{{route('fournisseur.produit.add')}}" class="btn btn-success float-end border-0">Ajouter un produit</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nom</th>
                                    <th>SKU</th>
                                    <th>Prix</th>
                                    <th>Nouveau prix</th>
                                    <th>Quantité</th>
                                    <th>Disponibilité</th>
                                    <th>Categorie</th>
                                    <th>Marque</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($produits as $produit)
                                    <tr>
                                        <td>{{$produit->id}}</td>
                                        <td>{{$produit->name}}</td>
                                        <td>{{$produit->sku}}</td>
                                        <td>{{$produit->prix}} FrCFA</td>
                                        <td>{{$produit->n_prix}} FrCFA</td>
                                        <td>{{$produit->quantite}}</td>
                                        <td>{{$produit->stock_etat}}</td>
                                        <td class="dropdown">
                                            <button class="border-0 bg-transparent dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                Categories
                                              </button>
                                              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                @foreach ($produit->categories as $categorie)
                                                    <li class="px-2"> {{$categorie->name}}</li>
                                                @endforeach
                                              </ul>
                                        </td>
                                        <td>{{$produit->marque->name}}</td>
                                        
                                        <td class="d-flex justify-content-between">
                                            <a href="{{route('fournisseur.produit.edit')}}" class="btn p-1 border-0 fs-0.5">Modifier</a>
                                            <button class="btn p-1 border-0 fs-0.5 bg-danger">Suprimer</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$produits->links()}}
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
