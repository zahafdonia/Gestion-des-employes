<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    public function handle(Request $request, Closure $next, ...$guards)
    {
        if (Auth::check()) {
            return $next($request);
        }

        return redirect()->route('login');
    }
    protected function unauthenticated($request, array $guards)
{
    logger('User is not authenticated'); // Ajout d'un message de débogage
    
    
}

}
