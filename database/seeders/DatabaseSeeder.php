<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Users Seeder
        $userIds = [];
        for ($i = 1; $i <= 2; $i++) {
            $userId = DB::table('users')->insertGetId([
                'name' => "User $i",
                'email' => "user$i@example.com",
                'password' => Hash::make('password'),
                'status' => 'Active',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $userIds[] = $userId; // Stocke l'ID de l'utilisateur créé
        }

        // Employees Seeder
        $employeeIds = [];
        for ($i = 1; $i <= 30; $i++) {
            $employeeId = DB::table('employees')->insertGetId([
                'employee_id' => "EMP-$i",
                'name' => "Employee $i",
                'city' => "City $i",
                'address' => "Address $i",
                'position' => "Position $i",
                'salary' => rand(30000, 80000) / 100,
                'user_id' => $userIds[$i % 2],  // Associer un user_id existant
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $employeeIds[] = $employeeId; // Stocke l'ID de l'employé créé
        }

        // Absences Seeder
        for ($i = 0; $i < 30; $i++) {
            DB::table('absences')->insert([
                'date' => now()->subDays($i),
                'reason' => "Reason " . ($i + 1),
                'duration' => rand(1, 5),
                'employee_id' => $employeeIds[$i],  // Utiliser l'ID d'employé valide
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Local Missions Seeder
        for ($i = 0; $i < 30; $i++) {
            DB::table('local_missions')->insert([
                'employee_id' => $employeeIds[$i],  // Utiliser l'ID d'employé valide
                'mission_id' => "LM-" . ($i + 1),
                'superviseur' => "Supervisor " . ($i + 1),
                'region' => "Region " . ($i + 1),
                'purpose' => "Purpose " . ($i + 1),
                'start_date' => now()->subDays($i),
                'end_date' => now()->subDays($i - 1),
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // International Missions Seeder
        for ($i = 0; $i < 30; $i++) {
            DB::table('international_missions')->insert([
                'employee_id' => $employeeIds[$i],  // Utiliser l'ID d'employé valide
                'mission_id' => "IM-" . ($i + 1),
                'user_id' => $userIds[$i % 2],  // Associer un user_id existant
                'superviseur' => "Supervisor " . ($i + 1),
                'purpose' => "Purpose " . ($i + 1),
                'start_date' => now()->subDays($i),
                'end_date' => now()->subDays($i - 1),
                'destination' => "Destination " . ($i + 1),
                'expenses' => rand(1000, 5000) / 100,
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
