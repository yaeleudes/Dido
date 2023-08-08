<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller{
    public function edit(Request $request){
        $user = $request->user();
        return view('dashboard', ['user' => $user]);
    }

    public function update(User $user, Request $request){
        
        // dd($request->session()->all());
        $user->update($request->session()->all());

        if (Auth::user()->utype === 'CLT') {
            return redirect()
            ->route('client.dashboard')
            ->with('status', 'Votre profile a été bien modifié!');
        }else {
            return redirect()
            ->route('home.index')
            ->with('status', 'Votre inscription a bien été pris en compte, Veuillez consulter votre boite mail pour continuer!');
        }
    }
}
