<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\DemandeConge;
use App\Models\Employee;
use App\Models\User;
use Carbon\Carbon;

class AdminCongeAnalyseController extends Controller
{
    public function analyserConges(Request $request)
    {
        // Récupérer les dates de début et de fin si elles sont fournies dans la requête
        $startDate = $request->get('start_date', null);
        $endDate = $request->get('end_date', null);

        // Créer la requête pour récupérer les demandes de congé
        $demandesQuery = DemandeConge::with('employee');

        // Si une date de début est fournie, filtrer par la date de début
        if ($startDate) {
            $demandesQuery->where('date_debut', '>=', Carbon::parse($startDate));
        }

        // Si une date de fin est fournie, filtrer par la date de fin
        if ($endDate) {
            $demandesQuery->where('date_fin', '<=', Carbon::parse($endDate));
        }

        

        // Récupérer les demandes filtrées
        $demandes = $demandesQuery->get();

        $employeesOnLeave = $demandes->pluck('employee.id')->unique(); // Liste des employés en congé

// Récupérer les employés avec idR=2 et qui ne sont pas en congé
//$availableEmployees = User::where('idR', 2) // Filtrer uniquement les employés
   // ->whereNotIn('id', $employeesOnLeave)   // Exclure ceux en congé
   // ->get();

        $totalEmployees = Employee::all(); // Tous les employés
        $availableEmployees = $totalEmployees->filter(function ($employee) use ($employeesOnLeave) {
            return !$employeesOnLeave->contains($employee->id); // Vérifier s'ils ne sont pas en congé
        });

         // Préparer les données pour le graphique
    $departments = $availableEmployees->groupBy('position'); // Regrouper par département
    $chartData = $departments->map(function ($employees, $department) {
        return [
            'position' => $department ?? 'Non spécifié', // Ajouter 'Non spécifié' si la position est vide
            'count' => $employees->count(),
        ];
    })->values();

    return view('admin.demande_conge.analyser_congees', [
        'availableEmployees' => $availableEmployees,
        'chartData' => $chartData,
    ]);

        // Retourner la vue avec les demandes filtrées
       // return view('admin.demande_conge.analyser_congees', compact('demandes', 'availableEmployees'));
    }
}
