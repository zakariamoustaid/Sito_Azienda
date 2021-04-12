<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class User
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
        //controllo se utente e` realmente un "user"
        if (Auth::check() && Auth::user()->role == "USER") {
            return $next($request);
        }

        return redirect('/login');
    }
}
