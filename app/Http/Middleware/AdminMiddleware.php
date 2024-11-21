<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Vérifie si l'utilisateur est connecté et s'il est administrateur
        if (Auth::check() && Auth::user()->idR === 1) {
            return $next($request);
        }
        // Sinon, renvoie une erreur 403 (Accès interdit)
        abort(403, 'Accès interdit');
    }
}