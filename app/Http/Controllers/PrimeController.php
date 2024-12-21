<?php

namespace App\Http\Controllers;

use App\Models\Prime;
use App\Models\Employee;
use App\Models\Absence;
use App\Models\Performance;
use Illuminate\Http\Request;

class PrimeController extends Controller
{
    public function awardPrime($employeeId)
    {
        // Charger l'employé avec ses relations
        $employee = Employee::with(['absences', 'performances'])->findOrFail($employeeId);
    
        // Calcul des absences
        $absence = $employee->absences->sum('days'); // Somme des jours d'absence
        if ($absence === null || $absence === 0) {
            return redirect()->back()->with('error', 'Aucune absence trouvée ou 0 jours d\'absence');
        }
    
        // Récupération de la dernière performance
        $performance = $employee->performances->last();
        if (!$performance) {
            return redirect()->back()->with('error', 'Aucune performance trouvée pour cet employé');
        }
    
        // Calcul de la prime
        $basePrime = 1000;
        $absenceFactor = $this->calculateAbsenceFactor($absence);
        $performanceFactor = $this->calculatePerformanceFactor($performance);
    
        $finalPrime = $basePrime * $absenceFactor * $performanceFactor;
    
        // Passer les données à la vue
        return view('awardPrime', compact('employee', 'absence', 'performance', 'finalPrime'));
    }
    
    // Calcul du facteur d'absence
    protected function calculateAbsenceFactor($absenceDays)
    {
        if ($absenceDays === 0) {
            return 1.00; // Aucun jour d'absence, la prime reste intacte
        } elseif ($absenceDays <= 3) {
            return 0.90; // 10% de réduction pour moins de 3 jours d'absence
        } elseif ($absenceDays <= 5) {
            return 0.75; // 25% de réduction pour moins de 5 jours d'absence
        } else {
            return 0.50; // 50% de réduction pour plus de 5 jours d'absence
        }
    }

    // Calcul du facteur de performance
    protected function calculatePerformanceFactor($performance)
    {
        if ($performance->rating >= 9) {
            return 1.20; // 20% d'augmentation pour une performance excellente
        } elseif ($performance->rating >= 7) {
            return 1.10; // 10% d'augmentation pour une bonne performance
        } else {
            return 1.00; // Pas d'augmentation pour une performance moyenne ou inférieure
        }
    }

    // Affichage des primes pour l'administrateur
    public function showAllPrimes()
    {
        $primes = Prime::all();
        return view('admin.primes', compact('primes'));
    }

    // Affichage des primes pour un employé (sans authentification)
    public function showEmployeePrimes($employeeId)
    {
        $primes = Prime::where('id_employee', $employeeId)->get();
        return view('employee.primes', compact('primes'));
    }
}
