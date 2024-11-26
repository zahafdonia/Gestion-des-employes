<?php

namespace App\Models;

namespace App\Models;



use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;



class User extends Authenticatable

{
    use HasFactory, Notifiable;

    protected $fillable = ['name', 'email', 'password', 'status'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Définit et enregistre le statut de l'utilisateur.
     *
     * @param string $status
     * @return void
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
        $this->save();
    }
}
