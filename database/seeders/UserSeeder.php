<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Ajout des utilisateurs dans la table user
        $users = [
            [
                'name' => 'Admin User',
                'lastname' => 'Admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('password123'),
                'idR' => 1, // Admin
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Employee User',
                'lastname' => 'Employee',
                'email' => 'employee@example.com',
                'password' => Hash::make('password123'),
                'idR' => 2, // Employee
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($users as $user) {
            // Insérer l'utilisateur dans la table user
            $userId = DB::table('user')->insertGetId($user);

            // Vérifier le rôle (idR) et insérer dans la table correspondante
            if ($user['idR'] === 1) { // Admin
                DB::table('admin')->insert([
                    'idU' => $userId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } elseif ($user['idR'] === 2) { // Employee
                DB::table('employee')->insert([
                    'idU' => $userId,
                    'address' => null, // Ajoutez des valeurs par défaut si nécessaires
                    'city' => null,
                    'position' => null,
                    'salary' => null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
