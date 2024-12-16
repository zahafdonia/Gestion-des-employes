<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    

    // Méthode pour afficher le tableau de bord de l'utilisateur
    public function index()
    {
        return view('user.dashboard'); // Assurez-vous de créer cette vue
    }
}
