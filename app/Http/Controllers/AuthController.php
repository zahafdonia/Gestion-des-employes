<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    // Affiche le formulaire de connexion
    //public function showLoginForm()
    //{
     //   return view('auth.login');
    //}

    // Traite la connexion
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Vérification des informations de connexion
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();

            // Redirection en fonction du rôle de l’utilisateur
            if ($user->role->idR === 1) {
                return redirect()->route('admin.dashboard')->with('status', 'Bienvenue Admin');
            } elseif ($user->role->idR === 2) {
                return redirect()->route('user.dashboard')->with('status', 'Bienvenue Employee');
            } else {
                return redirect('/')->with('status', 'Role non reconnu');
            }
        }

        return back()->withErrors([
            'email' => 'Les informations de connexion sont incorrectes.',
        ]);
    }

    // Affiche la page de tableau de bord
    public function dashboard()
    {
        $user = Auth::user();
        return view('dashboard', compact('user'));
    }

    // Déconnecte l’utilisateur
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
