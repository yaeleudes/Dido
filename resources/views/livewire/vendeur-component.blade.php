<div>
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="/" rel="nofollow">Accueil</a>
                <span></span> Vendeurs
            </div>
        </div>
    </div>
    <section id="testimonials" class="section-padding">
        <div class="container pt-25">
            <div class="row mb-50">
                <div class="col-lg-12 col-md-12 text-center">
                    {{-- <h6 class="mt-0 mb-10 text-uppercase  text-brand font-sm wow fadeIn animated">some facts</h6> --}}
                    <h2 class="mb-15 text-grey-1 wow fadeIn animated">La liste de nos vendeurs</h2>
                    <p class="w-50 m-auto text-grey-3 wow fadeIn animated">At vero eos et accusamus et iusto odio dignissimos ducimus quiblanditiis praesentium. ebitis nesciunt voluptatum dicta reprehenderit accusamus</p>
                </div>
            </div>
            <div class="row align-items-center">
                @foreach ($vendeurs as $vendeur)
                    <div class="col-md-6 col-lg-4">
                        <div class="hero-card box-shadow-outer-6 wow fadeIn animated mb-30 hover-up d-flex p-2" style="width: 100%">
                            <div class="hero-card-icon icon-left-1 w-25 m-auto ms-2">
                                <img class="border-radius-5 bg-brand-muted" src="/uploads/{{$vendeur->avatar}}" width="80" height="60" alt="">
                            </div>
                            <div class="pl-30 row">
                                <p class="mb-5 fw-bold p-0">
                                    {{$vendeur->name}}
                                    {{$vendeur->nickname}}
                                </p>
                                <p class="font-sm text-grey-5 p-0">{{$vendeur->telephone}}</p>
                                <div class="text-grey-3 row me-0">
                                    <div class="col-md-8 p-0"><span class="fw-bold">{{$vendeur->ville}}</span> / {{$vendeur->commune}} </div>
                                    <div class="col-md-4 p-0"><a class="btn p-1 float-end" href="">details</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{$vendeurs->links()}} 
            </div>
        </div>
    </section>
</div>
