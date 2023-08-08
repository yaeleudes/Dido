<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user()->utype === 'SADM') {
            return $next($request);
        } else {
            session()->flush();
            return redirect()->route('auth.connexion')->with('interdit', 'Espace reseré aux administrateur!');
        }
        
        
    }
}
