<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Vérifier le rôle de l'utilisateur connecté
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }

            return redirect()->route('user.dashboard'); // Cette ligne doit rediriger vers le tableau de bord de l'utilisateur
        }

        return back()->withErrors([
            'email' => 'Les informations d’identification fournies ne sont pas correctes.',
        ]);
    }


            // Afficher la vue d'inscription
        public function showRegisterForm()
        {
            return view('auth.register');
        }



        // Gérer l'inscription
        public function register(Request $request)
        {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|confirmed|min:6',
            ]);

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            return redirect()->route('login')->with('success', 'Inscription réussie. Connectez-vous pour continuer.');
        }

        // Gérer la déconnexion
        public function logout(Request $request)
        {
            Auth::logout();

            // Invalider la session
            $request->session()->invalidate();

            // Régénérer le token CSRF
            $request->session()->regenerateToken();

            // Rediriger vers la page de connexion
            return redirect('/login');
        }




}
