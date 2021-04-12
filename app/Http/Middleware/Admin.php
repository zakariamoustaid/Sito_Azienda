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
        $message = "Non hai i permessi per accedere alla pagina";

        //controllo se utente e` realmente un "admin"
        if (Auth::check() && Auth::user()->role == "ADMIN") {
            return $next($request);
        }

        return redirect('/diario')->with('alert', $message);
    }
}

