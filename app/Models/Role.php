<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Seeder;

class Role extends Model
{
    use HasFactory;

    // Spécifier la table si ce n'est pas la convention (par défaut Laravel utilise 'roles')
    protected $table = 'roles';

    // Les champs remplissables
    protected $fillable = ['name'];

    // Relation avec les utilisateurs
    public function users()
    {
        return $this->hasMany(User::class, 'id_role');
    }
}

    


class RoleSeeder extends Seeder
{
    public function run()
    {
        // Ajouter les rôles par défaut
        \App\Models\Role::create([
            'name' => 'Admin',
        ]);
        
        \App\Models\Role::create([
            'name' => 'Employee',
        ]);
    }
}


