<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\UpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = $request->user();
        return view('dashboard', [
            'user' => $user
        ]);
    }
    
    /**
     * Update the user's profile information.
     */
    public function update(UpdateRequest $request): RedirectResponse
    {

        $request->user()->fill($request->validated());
        $request->user()->updated_at = now();
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();
        $user = $request->user();
        return redirect()->route('dashboard', ['user' => $user])->with('status', 'Votre profile a été bien modifié!');

        // if (Auth::user()->utype === 'CLT') {
        //     return redirect()
        //     ->route('client.dashboard')
        //     ->with('status', 'Votre inscription a bien été effectuée!');
        // }else {
        //     return redirect()
        //     ->route('home.index')
        //     ->with('status', 'Votre inscription a bien été pris en compte, Veuillez consulter votre boite mail pour continuer!');
        // }
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
