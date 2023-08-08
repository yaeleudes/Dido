<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{route('home.index')}}">Accueil</a>
                    <span></span>   Modifier une catégorie
                </div>
            </div>
        </div>

        <section class="mt-50 mb-50">
            <div class="container">
                <div class="col-md-12">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                Modifier une catégorie
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.categories')}}" class="btn btn-success float-end">Toutes les catégories</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success text-center" role="alert">{{Session::get('message')}}</div>
                        @endif
                        <form wire:submit.prevent="updateCategorie">
                            <div class="mb-3 mt-3">
                                <label for="name" class="form-label">Nom</label>
                                <input type="text" name="name" id="" class="form-control" placeholder="Entrez le nom de la categorie" wire:model="name" wire:keyup="slug">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="slug" class="form-label">Slug</label>
                                <input type="text" name="slug" id="" class="form-control" wire:model="slug">
                                @error('slug')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="detail" class="form-label">Nom</label>
                                <input type="text" name="detail" id="" class="form-control" placeholder="Entrez un detail de la categorie" wire:model="detail">
                                @error('detail')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
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
