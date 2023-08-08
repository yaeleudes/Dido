<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{route('home.index')}}">Accueil</a>
                    <span></span>   Toutes les catégories
                </div>
            </div>
        </div>

        <section class="mt-50 mb-50">
            <div class="container">
                <div class="col-md-12">
                    <div class="card-header">
                        Toutes les catégories
                        <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-6">
                                <a href="{{route('admin.categorie.add')}}" class="btn btn-success float-end border-0">Ajouter une nouvelle categorie</a>
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
                                    <th>Detail</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $categorie)
                                    <tr>
                                        <td>{{$categorie->id}}</td>
                                        <td>{{$categorie->name}}</td>
                                        <td>{{$categorie->slug}}</td>
                                        <td>{{$categorie->detail}}</td>
                                        <td class="d-flex justify-content-between">
                                            <a href="{{route('admin.categorie.update', ['categorie_id' => $categorie->id])}}" class="btn  bg-warning p-1 col-md-4 border-0">
                                                Modifier
                                            </a>
                                            <button class="btn p-1 col-md-4 bg-danger border-0" wire:click="supprimer({{$categorie->id}})">
                                                Supprimer
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$categories->links()}}
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
