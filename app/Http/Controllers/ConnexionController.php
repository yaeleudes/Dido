<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChampsRequest;
use App\Http\Requests\ConnexionRequest;
use App\Http\Requests\UpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConnexionController extends Controller
{
    public function formulaire(){
        return view('auth.connexion');
    }

    public function connexion(ConnexionRequest $connexionRequest){
       $credentials = $connexionRequest->validated();

       if (Auth::attempt($credentials)) {
           $connexionRequest->session()->regenerate();

            if (!Auth::user()->utype === 'CLT') {
                return redirect()->route('client.dashboard');
            }

            return redirect()->intended(route('home.index'));
       }

       return to_route('auth.connexion')->withErrors([
        'email' => "Votre email est invalide"
       ]);
    }

    public function deconnexion(){
        Auth::logout();
        return to_route('home.index');
    }
}
