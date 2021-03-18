<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //controllo se utente e` realmente un "admin"
        if (Auth::check() && Auth::user()->role == "admin") {
            return $next($request);
        }

        return redirect('/login');
    }
}

