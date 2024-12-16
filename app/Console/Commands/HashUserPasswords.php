<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User; // Assurez-vous que votre modèle utilisateur est correctement configuré
use Illuminate\Support\Facades\Hash;

class HashUserPasswords extends Command
{
    // Nom de la commande
    protected $signature = 'passwords:hash';

    // Description de la commande
    protected $description = 'Hash all plain-text passwords using Bcrypt';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Récupère les utilisateurs ayant des mots de passe non hachés
        $users = User::all();

        $this->info("Total users found: " . $users->count());

        foreach ($users as $user) {
            // Vérifiez si le mot de passe semble déjà haché
            if (!password_get_info($user->password)['algo']) {
                $user->password = Hash::make($user->password);
                $user->save();
                $this->info("Password hashed for user ID: {$user->id}");
            } else {
                $this->info("Password for user ID {$user->id} is already hashed.");
            }
        }

        $this->info('Password hashing process completed.');
    }
}