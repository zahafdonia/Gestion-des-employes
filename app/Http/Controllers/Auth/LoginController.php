<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
class LoginController extends Controller
{
    // Afficher le formulaire de connexion
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Traiter la connexion
    public function login(Request $request)
    {
        // Validation des entrées
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Tenter de s'authentifier
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Vérifier le rôle de l'utilisateur et rediriger en conséquence
            $user = Auth::user();
            if ($user->idR == 1) {  // Supposons que l'idR = 1 soit pour les admins
                return redirect()->route('admin.dashboard');
            } elseif ($user->idR == 2) {  // Supposons que l'idR = 2 soit pour les employés
                return redirect()->route('employee.dashboard');
            }
        }

        // Si échec de l'authentification, retourner avec un message d'erreur
        return back()->withErrors([
            'email' => 'Les informations d\'identification sont incorrectes.',
        ]);
    }
/*
    public function login(Request $request)
    {
        // Validation des entrées
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Tenter de s'authentifier
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();

           
        }

        // Si l'authentification échoue, retournez une réponse d'erreur
        throw ValidationException::withMessages([
            'email' => ['Les informations d\'identification sont incorrectes.'],
        ]);
    }
*/
    // Déconnexion
    public function logout(Request $request)
    {
        Auth::logout();
        return response()->json(['message' => 'Déconnexion réussie'], 200);
    }
}
