<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    public function run()
    {
        // Insérer les utilisateurs Admins basés sur la table users
        $admins = DB::table('user')->where('idR', 1)->get();

        foreach ($admins as $admin) {
            DB::table('admin')->insert([
                'idAdmin' => $admin->idU, // Associe avec l'utilisateur
                
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
