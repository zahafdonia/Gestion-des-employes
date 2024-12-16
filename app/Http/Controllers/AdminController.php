<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Méthode pour afficher le tableau de bord de l'admin
    public function index()
    {
        return view('admin.dashboard'); 
    }
}
