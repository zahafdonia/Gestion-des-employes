<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    // La table associée à ce modèle
    protected $table = 'admin';

    // La clé primaire de la table
    protected $primaryKey = 'admin_id';

    // Les attributs qui peuvent être assignés en masse
    protected $fillable = [
        'user_id',
    ];

    /**
     * Relation avec le modèle User.
     * Un admin appartient à un utilisateur (user).
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
