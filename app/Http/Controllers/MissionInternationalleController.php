<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InternationalMission;

class MissionInternationalleController extends Controller
{
    // Vue pour les utilisateurs
    public function userIndex()
    {
        // Récupérer les missions de l'utilisateur connecté
        $missions = InternationalMission::where('employeeid', 'EMPL001')->get(); // Remplacer par l'ID dynamique

        return view('missions.international.user.index', compact('missions'));
    }

    // Vue pour les administrateurs
    public function adminIndex()
    {
        $missions = InternationalMission::all(); // Tous les missions

        return view('missions.international.admin.index', compact('missions'));
    }

    // Créer un rapport pour une mission approuvée
    public function createMissionReportInternational($id)
    {
        $mission = InternationalMission::findOrFail($id);

        // Vérifier si la mission est approuvée
        if ($mission->status !== 'approved') {
            return redirect()->route('missions.international.user.index')->with('error', 'Vous ne pouvez créer un rapport que pour une mission approuvée.');
        }

        return view('missions.international.user.report.create', compact('mission'));
    }

    // Soumettre un rapport
    public function submitInternationalMissionReport(Request $request, $id)
    {
        $validatedData = $request->validate([
            'reportDetails' => 'required|string',
            'reportDate' => 'required|date',
            'receipt' => 'nullable|file|mimes:jpg,png,pdf|max:2048',
        ]);

        $mission = InternationalMission::findOrFail($id);

        if ($request->hasFile('receipt')) {
            $path = $request->file('receipt')->store('international_receipts', 'public');
            $mission->receipt_path = $path;
        }

        $mission->report_details = $validatedData['reportDetails'];
        $mission->report_date = $validatedData['reportDate'];
        $mission->save();

        return redirect()->route('missions.international.user.index')->with('success', 'Rapport soumis avec succès.');
    }

    // Approuver une mission
    public function approveMission($id)
    {
        $mission = InternationalMission::findOrFail($id);
        $mission->status = 'approved';
        $mission->save();

        return redirect()->route('missions.international.admin.index')->with('success', 'Mission approuvée avec succès.');
    }

    // Rejeter une mission
    public function rejectMission($id)
    {
        $mission = InternationalMission::findOrFail($id);
        $mission->status = 'rejected';
        $mission->save();

        return redirect()->route('missions.international.admin.index')->with('success', 'Mission rejetée avec succès.');
    }
    public function create()
    {
        return view('missions.international.create');
    }

    // Enregistrer une nouvelle mission internationale
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'destination' => 'required|string|max:255',
            'purpose' => 'required|string|max:500',
            'start_date' => 'required|date|after:today',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        // Utilisation d'un `employeeid` fictif
        $employeeid = 'EMPL001';

        // Créer une nouvelle mission
        $mission = new InternationalMission();
        $mission->destination = $validatedData['destination'];
        $mission->purpose = $validatedData['purpose'];
        $mission->start_date = $validatedData['start_date'];
        $mission->end_date = $validatedData['end_date'];
        $mission->status = 'pending'; // Statut initial par défaut
        $mission->employeeid = $employeeid; // Données fictives pour l'employé
        $mission->save(); // Le mission_id sera généré automatiquement ici

        return redirect()->route('missions.international.user.index')->with('success', 'Mission ajoutée avec succès.');
    }
}
