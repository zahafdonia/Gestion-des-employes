<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Admin;

class UserAndAdminSeeder extends Seeder
{
    public function run()
    {
        // Créer l'utilisateur
        $user = User::create([
            'email' => 'admin@example.com',
            'password' => bcrypt(substr('password', 0, 12)), // Vous pouvez ajuster la longueur du mot de passe si nécessaire
            'lastname' => 'AdminLastName',
            'name' => 'AdminFirstName',
            'idR' => 1, // Assurez-vous que 'idR' est valide et correspond à une clé existante dans votre base de données
            'status' => 'active',
        ]);

        // Créer un enregistrement Admin associé à cet utilisateur
        $admin = Admin::create([
            'idU' => $user->idU, // Utilisation de l'ID de l'utilisateur créé pour lier à l'admin
        ]);
    }
}
