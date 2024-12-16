<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Vérifier si l'utilisateur est authentifié
        if (Auth::check()) {
            // Vérifier si l'utilisateur a le rôle requis
            if (Auth::user()->idR == $role) {
                return $next($request);
            } else {
                // Si l'utilisateur n'a pas le rôle requis, rediriger avec un message d'erreur
                return redirect('/login')->withErrors(['message' => 'Accès non autorisé. Vous n\'avez pas les droits nécessaires.']);
            }
        }

        // Si l'utilisateur n'est pas authentifié, rediriger vers la page de connexion
        return redirect('/login')->withErrors(['message' => 'Veuillez vous connecter pour accéder à cette page.']);
    }
}
