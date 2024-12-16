<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LocalMission;

class LocalMissionController extends Controller
{
    /**
     * Affiche la page de création de mission locale.
     */
    public function createMissionLocale()
    {
        return view('missions.local.create'); // Vue du formulaire
    }

    /**
     * Soumet une nouvelle mission locale.
     */
    public function store(Request $request)
    {
        // Valide les données de la requête
        $validatedData = $request->validate([
            'region' => 'required|string|max:255',
            'accompanying_person' => 'required|string|max:255',
            'superviseur' => 'required|string|max:255',
            'purpose' => 'required|string|max:255',
            'start_date' => 'required|date|before_or_equal:end_date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'license_plate' => 'required|string|max:20',
            'car_type' => 'required|string|max:50',
            'fuel_type' => 'required|string|max:50',
            'carte_carburant' => 'required|numeric',
            'distance_traveled' => 'required|numeric',
            'fuel_cost' => 'nullable|numeric',
        ]);

        // Générer un ID de mission unique
        $validatedData['mission_id'] = 'ML' . strtoupper(uniqid());

        // Vérifier si l'employé existe dans la table 'employees' avec l'ID 'EMPL001'
        $employee = \App\Models\Employee::where('employee_id', 'EMPL001')->first();

        if ($employee) {
            // Ajouter l'ID de l'employé trouvé dans les données
            $validatedData['employee_id'] = $employee->id;
        } else {
            // Si l'employé n'existe pas, on peut renvoyer un message d'erreur
            return redirect()->back()->with('error', 'Employé non trouvé.');
        }

        // Calculer le coût du carburant
        if (isset($validatedData['distance_traveled'])) {
            $validatedData['fuel_cost'] = ($validatedData['distance_traveled'] / 100) * 2.525;
        }

        // Définit le statut initial comme "Pending"
        $validatedData['status'] = 'Pending';

        // Crée la mission locale
        LocalMission::create($validatedData);

        return redirect()->route('local_missions.index')->with('success', 'Mission locale créée avec succès.');
    }



    /**
     * Affiche la liste des missions locales.
     */
    public function index()
    {
        // Récupère toutes les missions locales pour un employé spécifique (EMPL001)
        $employee = \App\Models\Employee::where('employee_id', 'EMPL001')->first();

        if ($employee) {
            $missions = LocalMission::where('employee_id', $employee->id)->get();
        } else {
            $missions = collect();  // Retourne une collection vide si l'employé n'existe pas
        }

        return view('missions.local.index', compact('missions'));
    }


    /**
     * Affiche la page pour soumettre un rapport de mission.
     */
    public function createReport($id)
    {
        $mission = LocalMission::findOrFail($id);

        return view('missions.local.create_report', compact('mission'));
    }

    /**
     * Soumet un rapport de mission.
     */
    public function submitReport(Request $request, $id)
    {
        $validatedData = $request->validate([
            'reportDetails' => 'required|string',
            'reportDate' => 'required|date',
            'receipt' => 'nullable|file|mimes:jpg,png,pdf|max:2048',
        ]);

        $mission = LocalMission::findOrFail($id);

        // Gère le fichier de réception (si fourni)
        if ($request->hasFile('receipt')) {
            $path = $request->file('receipt')->store('local_receipts', 'public');
            $mission->receipt_path = $path;
        }

        $mission->report_details = $validatedData['reportDetails'];
        $mission->report_date = $validatedData['reportDate'];
        $mission->status = 'Reported'; // Changez le statut si nécessaire
        $mission->save();

        return redirect()->route('local_missions.index')->with('success', 'Rapport soumis avec succès.');
    }
    /**
 * Affiche les missions locales pour l'administrateur.
 */
public function adminIndex()
{
    $missions = LocalMission::all(); // Liste complète des missions
    return view('admin.local_missions.index', compact('missions'));
}

/**
 * Approuve une mission locale.
 */
public function approve($id)
{
    $mission = LocalMission::findOrFail($id);
    $mission->status = 'Approved';
    $mission->save();

    return redirect()->route('admin.local_missions.index')->with('success', 'Mission approuvée avec succès.');
}

/**
 * Rejette une mission locale.
 */
public function reject($id)
{
    $mission = LocalMission::findOrFail($id);
    $mission->status = 'Rejected';
    $mission->save();

    return redirect()->route('admin.local_missions.index')->with('success', 'Mission rejetée avec succès.');
}
public function edit($id)
{
    $mission = LocalMission::findOrFail($id); // Récupérer la mission avec l'ID
    return view('missions.local.edit', compact('mission'));
}
public function update(Request $request, $id)
{
    // Valider les données
    $request->validate([
        'region' => 'required|string|max:255',
        'purpose' => 'required|string|max:500',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
        'license_plate' => 'required|string|max:20',
        'car_type' => 'required|string|max:50',
        'fuel_type' => 'required|string|max:50',
        'carte_carburant' => 'required|numeric',
        'distance_traveled' => 'required|numeric',
        'fuel_cost' => 'nullable|numeric',
    ]);

    // Récupérer la mission et la mettre à jour
    $mission = LocalMission::findOrFail($id);
    $mission->update($request->all());

    // Rediriger après la mise à jour
    return redirect()->route('local_missions.index')->with('success', 'Mission mise à jour avec succès.');
}

public function destroy($id)
{
    // Trouver la mission par ID
    $mission = LocalMission::findOrFail($id);

    // Supprimer la mission
    $mission->delete();

    // Rediriger avec un message de succès
    return redirect()->route('local_missions.index')->with('success', 'Mission supprimée avec succès.');
}

}
