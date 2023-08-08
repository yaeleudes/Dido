<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{route('home.index')}}">Accueil</a>
                    <span></span>   Tous les fournisseurs
                </div>
            </div>
        </div>

        <section class="mt-50 mb-50">
            <div class="container">
                <div class="col-md-12">
                    <div class="card-header">
                        Tous les fournisseurs
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
                                    <th>Detail</th>
                                    <th>Etat</th>
                                    <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach ($vendeurs as $vendeur)
                                    <tr>
                                        <td>{{$vendeur->id}}</td>
                                        <td>{{$vendeur->name}}</td>
                                        <td>{{$vendeur->nickname}}</td>
                                        <td>{{$vendeur->telephone}}</td>
                                        <td>{{$vendeur->description}}</td>
                                        <td>{{$vendeur->etat}}</td>
                                        <td class="d-flex justify-content-between">
                                            <button class="btn p-1 col-md-4 bg-success border-0" wire:click="autorise({{$vendeur->id}})"
                                                 @if ($vendeur->etat === 'autorise')
                                                    @disabled(true)
                                                @endif>
                                                Autoriser
                                            </button>
                                            <button class="btn p-1 col-md-4 bg-danger border-0" wire:click="bloque({{$vendeur->id}})"
                                                @if ($vendeur->etat === 'bloque')
                                                    @disabled(true)
                                                @endif>
                                                Bloquer
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$vendeurs->links()}}
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
