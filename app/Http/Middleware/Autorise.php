<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Autorise
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user()->etat === 'autorise' && Auth::user()->utype === 'ADM') {
            return $next($request);
        }else{
            session()->flush();
            return redirect()->route('auth.connexion')->with('interdit', "Vous n'etes pas autorisé!");
        }
    }
}
