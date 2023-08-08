<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{route('home.index')}}">Accueil</a>
                    <span></span>   Liste des produits
                </div>
            </div>
        </div>

        <section class="mt-50 mb-50">
            <div class="container">
                <div class="col-md-12">
                    <div class="card-header">
                        Liste des produits
                        <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-6">
                                {{-- <a href="{{route('admin.produit.add')}}" class="btn btn-success float-end">Ajouter une nouvelle produit</a> --}}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nom</th>
                                    <th>Slug</th>
                                    <th>Prix</th>
                                    <th>Quantité</th>
                                    <th>Fournisseur</th>
                                    <th>Categories</th>
                                    <th>Marque</th>
                                    <th>Details du produit</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($produits as $produit)
                                    <tr>
                                        <td>{{$produit->id}}</td>
                                        <td>{{$produit->name}}</td>
                                        <td>{{$produit->slug}}</td>
                                        <td>{{$produit->prix}} FrcFA</td>
                                        <td>{{$produit->quantite}}</td>
                                        <td>{{$produit->user->name}}</td>
                                        <td class="dropdown">
                                            <button class="border-0 bg-transparent dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                Categories
                                              </button>
                                              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                @foreach ($produit->categories as $categorie)
                                                    <li class="px-2">{{$categorie->name}}</li>
                                                @endforeach
                                              </ul>
                                        </td>
                                        <td>{{$produit->marque->name}}</td>
                                        <td>{{$produit->detail}}</td>
                                        <td>Krkrk</td>
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
