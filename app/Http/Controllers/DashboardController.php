<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // Tableau de bord utilisateur
    public function userDashboard()
    {
        return view('user.dashboard'); // Vue pour le tableau de bord utilisateur
    }

    // Tableau de bord administrateur
    public function adminDashboard()
    {
        // Vérifiez si l'utilisateur est authentifié et a le rôle 'admin'
        if (Auth::check() && Auth::user()->role === 'admin') {
            return view('admin.dashboard'); // Vue pour le tableau de bord administrateur
        }

        // Si l'utilisateur n'est pas administrateur, redirigez-le
        return redirect()->route('user.dashboard');
    }
}
