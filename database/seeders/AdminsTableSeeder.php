<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminsTableSeeder extends Seeder
{
    public function run()
    {
        Admin::create([
            'id_user' => 1,  // Assurez-vous que l'ID d'utilisateur existe dans la table 'users'
        ]);
    }
}
