<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{route('home.index')}}">Accueil</a>
                    <span></span>   Liste des clients
                </div>
            </div>
        </div>

        <section class="mt-50 mb-50">
            <div class="container">
                <div class="col-md-12">
                    <div class="card-header">
                        Liste des clients
                        <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-6">
                                {{-- <a href="{{route('admin.vendeur.add')}}" class="btn btn-success float-end">Ajouter une nouvelle vendeur</a> --}}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nom</th>
                                    <th>Prenoms</th>
                                    <th>N° Telephone</th>
                                    <th>Ville</th>
                                    <th>Commune</th>
                            </thead>
                            <tbody>
                                @foreach ($clients as $client)
                                    <tr>
                                        <td>{{$client->id}}</td>
                                        <td>{{$client->name}}</td>
                                        <td>{{$client->nickname}}</td>
                                        <td>{{$client->telephone}}</td>
                                        <td>{{$client->ville}}</td>
                                        <td>{{$client->commune}}</td>  
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$clients->links()}}
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
