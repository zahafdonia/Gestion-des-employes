<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // Importer la classe Authenticatable
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Laravel\Sanctum\HasApiTokens; // Importez ce trait
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable implements AuthenticatableContract
{
    use HasFactory;
    use HasApiTokens, Notifiable;


    protected $table = 'user';  // Nom de la table dans la base de données
    protected $primaryKey = 'idU';  // Nom de la clé primaire
    public $timestamps = false; // Désactiver les timestamps si non utilisés

    protected $fillable = [
        'email',
        'password',
        'lastname',
        'name',
        'idR',
        'status',
    ];

    public function admin()
    {
        return $this->hasOne(Admin::class, 'idU','idU');
    }

    public function employee()
    {
        return $this->hasOne(Employee::class, 'idU', 'idU');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'idR', 'idR');
    }

    public function isAdmin()
    {
        return $this->idR === 1; // Exemple, 1 peut être l'ID du rôle admin
    }

    public function isEmployee()
    {
        return $this->idR === 2; // Exemple, 2 peut être l'ID du rôle employee
    }
}
