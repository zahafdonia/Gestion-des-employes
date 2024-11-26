<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    // Spécifier le nom de la table
    protected $table = 'admins';

    // Les champs remplissables
    protected $fillable = [
        'id_user',
    ];

    // Relation avec User (un Admin a un utilisateur)
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
