<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DemandeConge;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;

class DemandeCongeController extends Controller
{
    public function create()
    {
        return view('user.demande_conge.create');
    }

    public function store(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'employeeId' => 'required|exists:employee,employeeId',
            'date_debut' => 'required|date|after_or_equal:today',
            'date_fin' => 'required|date|after_or_equal:date_debut',
            'type' => 'required|string',
            'commentaire' => 'nullable|string',
        ]);

        $employeeId = Auth::user()->employeeId;

        // Création de la demande de congé
        DemandeConge::create([
            'employeeId' => $employeeId,
            'date_debut' => $validated['date_debut'],
            'date_fin' => $validated['date_fin'],
            'type' => $validated['type'],
            'commentaire' => $validated['commentaire'] ?? null,
            'statut' => 'En attente',
        ]);

        return redirect()->route('user.demande_conge.index')->with('success', 'Demande de congé soumise avec succès.');
    }

    public function index()
    {
        $employeeId = Auth::user()->employeeId;
        $demandes = DemandeConge::where('employeeId', $employeeId)->get();
    
        return view('user.demande_conge.index', compact('demandes'));
    }
    

    
}
