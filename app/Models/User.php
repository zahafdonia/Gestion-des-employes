<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    // Définir le nom de la table si nécessaire (Laravel utilise le nom pluriel par défaut)
    protected $table = 'users';

    // Indiquer les champs qui peuvent être remplis par l'utilisateur
    protected $fillable = [
        'name',
        'email',
        'password',
        'id_role',
    ];

    // Si vous avez des relations, comme avec la table roles
    public function role()
    {
        return $this->belongsTo(Role::class, 'id_role');
    }
}
