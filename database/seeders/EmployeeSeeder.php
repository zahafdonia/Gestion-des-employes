<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    public function run()
    {
        // Insérer les utilisateurs Employees basés sur la table users
        $employees = DB::table('user')->where('idR', 2)->get();

        foreach ($employees as $employee) {
            DB::table('employee')->insert([
                'employeeId ' => $employee->idU, // Associe avec l'utilisateur
                
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
