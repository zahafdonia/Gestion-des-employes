<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        'role', // Ajoutez ce champ

    ];
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }
    public function hasRole(string $role): bool
    {
        return $this->role === $role;
    }


    public function employees()
{
    return $this->hasMany(Employee::class);
}


    public function status()
    {
        return $this->hasOne(Status::class);
    }

    public function internationalMissions()
    {
        return $this->hasMany(InternationalMission::class);
    }
}
