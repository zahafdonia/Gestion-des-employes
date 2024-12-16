<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements AuthenticatableContract
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $table = 'users';  // Nom de la table
    protected $primaryKey = 'id';  // La clé primaire est 'id' (et non 'idU')
    public $timestamps = true;  // Les timestamps sont utilisés dans la table

    protected $fillable = [
        'name',
        'email',
        'password',
        'pin_code',
        'permissions',
        'email_verified_at',
        'remember_token',
    ];

    // Constantes pour les rôles
    const ROLE_ADMIN = 1;
    const ROLE_EMPLOYEE = 2;

    public function admin()
    {
        return $this->hasOne(Admin::class, 'idU', 'id');
    }

    public function employee()
    {
        return $this->hasOne(Employee::class, 'idU', 'id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'idR', 'idR');
    }

    public function isAdmin()
    {
        return $this->idR === self::ROLE_ADMIN;
    }

    public function isEmployee()
    {
        return $this->idR === self::ROLE_EMPLOYEE;
    }

    public function loans()
    {
        return $this->hasMany(Loan::class, 'user_id');
    }
}
