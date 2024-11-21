<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, $role)
    {
        if (Auth::check() && Auth::user()->idR == $role) {
            return $next($request);
        }

        return redirect('/login')->withErrors(['message' => 'Accès non autorisé.']);
    }
}
