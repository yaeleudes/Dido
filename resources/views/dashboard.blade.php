<x-app-layout>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow">Accueil</a>                    
                    <span></span> Mon compte
                </div>
            </div>
        </div>
        <section class="pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 m-auto">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="dashboard-menu">
                                    <ul class="nav flex-column" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="dashboard-tab" data-bs-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="false"><i class="fi-rs-settings-sliders mr-10">
                                                </i>Dashboard
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="orders-tab" data-bs-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false">
                                                <i class="fi-rs-shopping-bag mr-10"></i>Mes commandes
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="track-orders-tab" data-bs-toggle="tab" href="#track-orders" role="tab" aria-controls="track-orders" aria-selected="false"><i class="fi-rs-shopping-cart-check mr-10">
                                                </i>Suivre mes commandes
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="address-tab" data-bs-toggle="tab" href="#address" role="tab" aria-controls="address" aria-selected="true">
                                                <i class="fi-rs-marker mr-10"></i>Mon adresse
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="account-detail-tab" data-bs-toggle="tab" href="#account-detail" role="tab" aria-controls="account-detail" aria-selected="true">
                                                <i class="fi-rs-user mr-10"></i>Details du compte
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <form method="POST" action="{{route('auth.deconnexion')}}"> 
                                                @method('delete')
                                                @csrf
                                                <a href="{{route('auth.deconnexion')}}" onclick="event.preventDefault(); this.closest('form').submit();"class="nav-link" href="login.html">
                                                    <i class="fi-rs-sign-out mr-10"></i>Deconnexion
                                                </a>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="tab-content dashboard-content">
                                    <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="mb-0">Hello {{Auth::user()->name}}! </h5>
                                            </div>
                                            <div class="card-body">
                                                <p>From your account dashboard. you can easily check &amp; view your <a href="#">recent orders</a>, manage your <a href="#">shipping and billing addresses</a> and <a href="#">edit your password and account details.</a></p>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Les Commandes --}}
                                    <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="mb-0">Your Orders</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Order</th>
                                                                <th>Date</th>
                                                                <th>Status</th>
                                                                <th>Total</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>#1357</td>
                                                                <td>March 45, 2022</td>
                                                                <td>Processing</td>
                                                                <td>$125.00 for 2 item</td>
                                                                <td><a href="#" class="btn-small d-block">View</a></td>
                                                            </tr>
                                                            <tr>
                                                                <td>#2468</td>
                                                                <td>June 29, 2022</td>
                                                                <td>Completed</td>
                                                                <td>$364.00 for 5 item</td>
                                                                <td><a href="#" class="btn-small d-block">View</a></td>
                                                            </tr>
                                                            <tr>
                                                                <td>#2366</td>
                                                                <td>August 02, 2022</td>
                                                                <td>Completed</td>
                                                                <td>$280.00 for 3 item</td>
                                                                <td><a href="#" class="btn-small d-block">View</a></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="track-orders" role="tabpanel" aria-labelledby="track-orders-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="mb-0">Orders tracking</h5>
                                            </div>
                                            <div class="card-body contact-from-area">
                                                <p>To track your order please enter your OrderID in the box below and press "Track" button. This was given to you on your receipt and in the confirmation email you should have received.</p>
                                                <div class="row">
                                                    <div class="col-lg-8">
                                                        <form class="contact-form-style mt-30 mb-50" action="#" method="post">
                                                            <div class="input-style mb-20">
                                                                <label>Order ID</label>
                                                                <input name="order-id" placeholder="Found in your order confirmation email" type="text" class="square">
                                                            </div>
                                                            <div class="input-style mb-20">
                                                                <label>Billing email</label>
                                                                <input name="billing-email" placeholder="Email you used during checkout" type="email" class="square">
                                                            </div>
                                                            <button class="submit submit-auto-width" type="submit">Track</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Mon adresse --}}
                                    <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="card mb-3 mb-lg-0">
                                                    <div class="card-header">
                                                        <h5 class="mb-0">Mon adresse</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <address>
                                                            <h3 class="fw-bold fs-3 mb-2">{{Auth::user()->ville}}</h3> 
                                                            <span class="">{{Auth::user()->commune}}</span><br> 
                                                            <hr>
                                                            Sault Ste. <br>
                                                            Marie, MI 00000
                                                        </address>
                                                        <p>New York</p>
                                                        <div class="row justify-content-center">
                                                            <div class="col-md-10 d-flex justify-content-center">
                                                                <button type="button" class="btn btn-small submit" onclick="document.getElementById('modif_adresse').style.visibility = 'visible'">
                                                                    Modifier mon adresse
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Modifier mon adresse --}}
                                            <div class="col-lg-6">
                                                <div class="card" id="modif_adresse" style="visibility: hidden">
                                                    <div class="card-header">
                                                        <h5 class="mb-0">Je modifie mon adresse</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <form action="{{route('client.update', Auth::user())}}" method="POST">
                                                            @method('patch')
                                                            @csrf
                                                            <div class="d-flex flex-column">
                                                                <div class="form-group col-md-12">
                                                                    <label for="ville">Ville <span class="required"></span></label>
                                                                    <input  class="form-control square" name="ville" type="text">
                                                                    @error('ville')
                                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <label for="commune">Commune <span class="required"></span></label>
                                                                    <input  class="form-control square" name="commune" type="text">
                                                                    @error('commune')
                                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="row justify-content-center">
                                                                <div class="col-md-6 d-flex justify-content-center">
                                                                    <button type="submit" class="btn btn-small submit" name="submit" value="Submit">
                                                                        Modifier
                                                                    </button>
                                                                </div>
                                                                <div class="col-md-6 d-flex justify-content-center">
                                                                    <button type="reset" class="btn btn-small submit" name="submit" value="Submit" onclick="document.getElementById('modif_adresse').style.visibility='hidden'">
                                                                        Annuler
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Details du compte --}}
                                    <div class="tab-pane fade" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Mes informations</h5>
                                            </div>
                                            <div class="card-body">
                                                {{-- <p>Already have an account? <a href="login.html">Log in instead!</a></p> --}}
                                                <form method="post" name="enq" action="{{route('client.update', Auth::user())}}">
                                                    @method('patch')
                                                    @csrf
                                                    <div class="row">
                                                        <div class="form-group col-md-6">
                                                            <label for="name">Nom <span class="required"></span></label>
                                                            <input  class="form-control square" name="name" type="text" placeholder="{{Auth::user()->name}}">
                                                            @error('name')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="nickname">Prenoms <span class="required"></span></label>
                                                            <input  class="form-control square" name="nickname" placeholder="{{Auth::user()->nickname}}">
                                                            @error('nickname')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label for="telephone">Numéro de téléphone <span class="required"></span></label>
                                                            <input  class="form-control square" name="telephone" type="text" placeholder="{{Auth::user()->telephone}}">
                                                            @error('telephone')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label for="email">Adresse email <span class="required"></span></label>
                                                            <input  class="form-control square" name="email" type="email" placeholder="{{Auth::user()->email}}">
                                                            @error('email')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label for="password">Mot de passe <span class="required"></span></label>
                                                            <input  class="form-control square" name="password" type="password">
                                                            @error('password')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label>Nouveau mot de passe <span class="required"></span></label>
                                                            <input  class="form-control square" name="npassword" type="password">
                                                            @error('password')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label>Mot de passe confirmé <span class="required"></span></label>
                                                            <input  class="form-control square" name="cpassword" type="password">
                                                            @error('password')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-12">
                                                            <button type="submit" class="btn btn-fill-out submit" name="submit" value="Submit">Sauvegarder</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-app-layout>
