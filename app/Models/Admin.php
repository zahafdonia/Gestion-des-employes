<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'admin'; // Table associée
    protected $primaryKey = 'idAdmin'; // Clé primaire
    public $timestamps = false; // Désactiver les timestamps si non utilisés

    protected $fillable = [
        'idU', 
        // Ajouter ici d'autres champs spécifiques à l'administrateur
    ];

    // Relation avec User
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'idU');
    }
}


