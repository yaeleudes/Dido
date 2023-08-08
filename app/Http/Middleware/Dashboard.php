<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Dashboard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // 

        switch (Auth::user()->utype) {
            case 'CLT':
                return redirect()->route('client.dashboard');
            case 'ADM':
                return redirect()->route('admin.dashboard');
            case 'SADM':
                return redirect()->route('super.dashboard');
            
            default:
                return $next($request);
                
        }
    }
}
