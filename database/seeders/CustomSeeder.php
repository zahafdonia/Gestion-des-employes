<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Employee;
use App\Models\InternationalMission;
use App\Models\LocalMission;
use App\Models\Absence;
use App\Models\Status;
use Carbon\Carbon;

class CustomSeeder extends Seeder
{
    public function run()
    {
        // Générer plusieurs utilisateurs et employés
        for ($i = 1; $i <= 10; $i++) {
            // Créer des utilisateurs
            $user = User::create([
                'name' => 'User ' . $i,
                'email' => 'user' . uniqid() . '@example.com',  // Assurez-vous que l'email est unique
                'password' => bcrypt('defaultpassword'), // Mot de passe par défaut
                'status' => 'active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            // Générer un ID unique pour l'employé
            $employeeId = 'EMPL' . str_pad($i, 3, '0', STR_PAD_LEFT);

            // Vérifier si l'employeeid existe déjà et ajuster si nécessaire
            while (Employee::where('employeeid', $employeeId)->exists()) {
                $i++;  // Incrémenter pour obtenir un ID unique
                $employeeId = 'EMPL' . str_pad($i, 3, '0', STR_PAD_LEFT);
            }

            // Créer des employés associés aux utilisateurs
            $employee = Employee::create([
                'employeeid' => $employeeId,  // ID unique pour chaque employé
                'name' => 'Employee ' . $i,
                'city' => 'City ' . $i,
                'address' => 'Address ' . $i,
                'position' => 'Position ' . $i,
                'salary' => rand(30000, 70000),  // Salaire aléatoire
                'idU' => $user->id,  // Associer l'utilisateur à l'employé
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            // Créer des missions internationales associées aux employés
            InternationalMission::create([
                'employeeid' => $employeeId, // This should be 'employee_id' instead
                'user_id' => $user->id,
                'superviseur' => 'Supervisor ' . $i,
                'purpose' => 'Mission Purpose ' . $i,
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addMonth(),
                'destination' => 'Destination ' . $i,
                'expenses' => rand(1000, 5000),
                'interim' => rand(200, 1000),
                'mission_report' => 'Report ' . $i,
                'receipt_path' => 'receipts/receipt' . $i . '.pdf',
                'status' => 'pending',
                'report_details' => 'Details of the report ' . $i,
                'report_date' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            // Créer des missions locales associées aux employés
            LocalMission::create([
                'employeeid' => $employeeId, // Utiliser le même employeeid
                'user_id' => $user->id,
                'mission_id' => $i, // Assurez-vous que cette clé existe dans votre structure
                'superviseur' => 'Supervisor ' . $i,
                'region' => 'Region ' . $i,
                'purpose' => 'Local mission purpose ' . $i,
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addWeek(),
                'accompanying_person' => 'Person ' . $i,
                'license_plate' => 'ABCD' . rand(1000, 9999),
                'car_type' => 'Car ' . $i,
                'fuel_type' => 'Fuel ' . $i,
                'carte_carburant' => rand(1, 5),
                'distance_traveled' => rand(50, 500),
                'fuel_cost' => rand(100, 500),
                'toll_expenses' => rand(10, 50),
                'hotel' => rand(50, 100),
                'indemnity' => rand(100, 200),
                'total_cost' => rand(500, 2000),
                'status' => 'pending',
                'report_details' => 'Local mission report details ' . $i,
                'report_date' => Carbon::now(),
                'receipt_path' => 'local_receipts/receipt' . $i . '.pdf',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            // Créer des absences associées aux employés
            Absence::create([
                'date' => Carbon::now(),
                'reason' => 'Sick',
                'duration' => rand(1, 5),
                'employee_id' => $employee->id,  // Utiliser l'ID d'employé
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        // Créer des statuts associés aux utilisateurs
        foreach (User::all() as $user) {
            Status::create([
                'user_id' => $user->id,
                'status' => 'active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
