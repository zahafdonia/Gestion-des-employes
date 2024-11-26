<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ajouter un utilisateur administrateur avec un rôle
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'),
            'id_role' => 1,  // Rôle d'administrateur, assurez-vous qu'il existe dans la table 'roles'
        ]);

        // Ajouter un autre utilisateur
        User::create([
            'name' => 'Employee 1',
            'email' => 'employee1@example.com',
            'password' => Hash::make('password123'),
            'id_role' => 2,  // Rôle d'employé
        ]);
    }
}
