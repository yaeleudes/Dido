<x-app-layout>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow">Accueil</a>                    
                    <span></span> Inscription
                </div>
            </div>
        </div>
        <section class="pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 m-auto">
                        <div class="row">
                            <div class="col-lg-6">
                            <div class="login_wrap widget-taber-content p-30 background-white border-radius-5">
                                    <div class="padding_eight_all bg-white">
                                        <div class="heading_s1">
                                            <h3 class="mb-30">Creer un compte</h3>
                                        </div>                                        
                                        <form method="post" action="{{route('auth.inscription')}}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <input type="text" required="" name="name" placeholder="Votre nom" value="{{old('name')}}">
                                            </div>
                                            @error('name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="form-group">
                                                <input type="text" required="" name="nickname" placeholder="Votre prenoms" value="{{old('nickname')}}">
                                            </div>
                                            @error('nickname')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="form-group">
                                                <input type="text" required="" name="telephone" placeholder="Votre  numéro de telephone" value="{{old('telephone')}}">
                                            </div>
                                            @error('telephone')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="form-group">
                                                <input type="text" required="" name="email" placeholder="Votre email">
                                            </div>
                                            @error('email')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <input type="text" required="" name="ville" placeholder="Votre ville" value="{{old('ville')}}">
                                                </div>
                                                @error('ville')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                                <div class="form-group col-md-6">
                                                    <input type="text" required="" name="commune" placeholder="Votre commune" value="{{old('commune')}}">
                                                </div>
                                                @error('commune')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input required="" type="password" name="password" placeholder="Password">
                                                @error('password')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input required="" type="password" name="password" placeholder="Confirm password">
                                                @error('password')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <hr>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="utype" id="flexRadioDefault1" value="CLT">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                  Je suis un client
                                                </label>
                                              </div>
                                              <div class="form-check">
                                                <input class="form-check-input" type="radio" name="utype" id="flexRadioDefault2" value="ADM" checked>
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                  Je suis un vendeur
                                                </label>
                                            </div>
                                            <div class="form-group">
                                                <label for="description">Ajoutez une description <span class="required">*</span></label>
                                                <input type="text" name="description" placeholder="Ajoutez une description">
                                                @error('description')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-groupe mb-3 mt-3">
                                                <label for="avatar" class="form-label">Ajouter une photo</label>
                                                <input type="file" name="avatar" id="" class="form-control border-0">
                                                @error('avatar')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="login_footer form-group">
                                                <div class="chek-form">
                                                    <div class="custome-checkbox">
                                                        <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox12" value="">
                                                        <label class="form-check-label" for="exampleCheckbox12"><span>I agree to terms &amp; Policy.</span></label>
                                                    </div>
                                                </div>
                                                <a href="privacy-policy.html"><i class="fi-rs-book-alt mr-5 text-muted"></i>Lean more</a>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-fill-out btn-block hover-up" name="login">Submit &amp; Register</button>
                                            </div>
                                        </form>                                        
                                        <div class="text-muted text-center">Already have an account? <a href="#">Sign in now</a></div>
                                    </div>
                                </div>
                            </div>                            
                            <div class="col-lg-6">
                               <img src="assets/imgs/login.png">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-app-layout>