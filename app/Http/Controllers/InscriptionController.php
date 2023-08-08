<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChampsRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Validation\Rules;


class InscriptionController extends Controller
{
    public function formulaire(){
        return view('auth.inscription');
    }

    
    public function enregistrement(ChampsRequest $request){
        
        // $user = User::create($request->validated());
        // dd($request->all());

        $image = $request->validated('avatar');
        $avatar_file = $request->file('avatar');
        $image_name = time().'-'.$avatar_file->getClientOriginalName();
        $avatar = $image->storeAs('avatar', $image_name, 'my_public_path');
        $avatar_path = asset('uploads/avatars'.$image_name);
        // dd($avatar);
        

        $user = User::create([
            'name' => $request->input('name'),
            'nickname' => $request->input('nickname'),
            'telephone' => $request->input('telephone'),
            'email' => $request->input('email'),
            'ville' => $request->input('ville'),
            'commune' => $request->input('commune'),
            'utype' => $request->input('utype'),
            'description' => $request->input('description'),
            'password' => Hash::make($request->input('password')),
            'avatar' => $avatar
        ]);



        $etat = ($request->input('utype') === 'CLT') ? 'autorise' : 'attente';

        event(new Registered($user));

        Auth::login($user);
        
        $user->update(['etat' => $etat, 'password' => Hash::make($request->input('password'))]);
        if (Auth::user()->utype === 'CLT') {
            return redirect()
            ->route('client.dashboard', $user)
            ->with('status', 'Votre inscription a bien été effectuée!');
        }else {
            return redirect()
            ->route('home.index', $user)
            ->with('status', 'Votre inscription a bien été pris en compte, Veuillez consulter votre boite mail pour continuer!');
        }
    }
}
