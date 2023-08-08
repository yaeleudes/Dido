<?php

use App\Http\Controllers\ConnexionController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\ProfileController;
use App\Http\Livewire\AccueilComponent;
use App\Http\Livewire\Admin\AddCategorieComponent;
use App\Http\Livewire\Admin\AddProduitComponent;
use App\Http\Livewire\Admin\AdminCategoriesComponent;
use App\Http\Livewire\Admin\AdminProduitComponent;
use App\Http\Livewire\Admin\ListClientComponent;
use App\Http\Livewire\Admin\ListVendeursComponent;
use App\Http\Livewire\AdminDashbordComponent;
use App\Http\Livewire\BoutiqueComponent;
use App\Http\Livewire\Client\ClientDashboardComponent;
use App\Http\Livewire\DetailComponent;
use App\Http\Livewire\UpdateCategorieComponent;
use App\Http\Livewire\VendeurComponent;
use App\Http\Livewire\VendeurProduitComponent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', AccueilComponent::class)->name('home.index');
Route::get('/produit', BoutiqueComponent::class)->name('produit');
Route::get('/produits/{slug}', DetailComponent::class)->name('produit.detail');
Route::get('/Vendeurs', VendeurComponent::class)->name('vendeurs');


//Pour la connexion
Route::get('/connexion', [ConnexionController::class, 'formulaire'])->name('auth.connexion');
Route::post('/connexion', [ConnexionController::class, 'connexion']);
Route::delete('/deconnexion', [ConnexionController::class, 'deconnexion'])->name('auth.deconnexion');


//Pour l'inscription
Route::get('/inscription', [InscriptionController::class, 'formulaire'])->name('auth.inscription');
Route::post('/inscription', [InscriptionController::class, 'enregistrement']);


//Pour les clients
Route::middleware('auth')->group(function(){
    Route::get('/client/dashboard', [ProfileController::class, 'edit'])->name('client.dashboard');
    // Route::get('/client/dashboard', ClientDashboardComponent::class)->name('client.dashboard');
    Route::patch('/client/dashboard/edit', [ProfileController::class, 'update'])->name('client.update');
});


//Pour les fournisseurs
Route::middleware(['auth', 'authadmin', 'autorise'])->group(function(){
    Route::get('/fournisseur/dashboard', AdminDashbordComponent::class)->name('admin.dashboard');
    Route::get('/fournisseur/produits', VendeurProduitComponent::class)->name('fournisseur.produit');
    Route::get('/fournisseur/produits/ajout', AddProduitComponent::class)->name('fournisseur.produit.add'); 
    Route::get('/fournisseur/produits/modifier', [VendeurProduitComponent::class, 'modifier'])->name('fournisseur.produit.edit');

});


//Pour les Admins
Route::middleware(['auth', 'super'])->group(function(){
    Route::get('/Admin/dashboard', AdminDashbordComponent::class)->name('super.dashboard');
    Route::get('/admin/categories', AdminCategoriesComponent::class)->name('admin.categories');
    Route::get('/admin/categorie/ajout', AddCategorieComponent::class)->name('admin.categorie.add');
    Route::get('/admin/categorie/modification/{categorie_id}', UpdateCategorieComponent::class)->name('admin.categorie.update');
    Route::get('/admin/produits', AdminProduitComponent::class)->name('admin.produit');
    Route::get('/admin/vendeurs', ListVendeursComponent::class)->name('admin.listvendeurs');
    Route::get('/admin/clients', ListClientComponent::class)->name('admin.client');
});


// Profiles
Route::middleware('auth')->group(function(){
    Route::patch('/profile', [ProfileController::class, 'update'])->name('auth.update');
});


Route::get('/dashboard', function () {

    if (Auth::user()->utype === 'CLT') {
        return redirect()->route('client.dashboard');
    } else if (Auth::user()->utype === 'ADM') {
        return redirect()->route('admin.dashboard');
    } else if(Auth::user()->utype === 'SADM') {
        return redirect()->route('super.dashboard');
    }
    // return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('auth.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
