<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Absence extends Model
{
    use HasFactory;

    protected $table = 'absence'; // Nom de la table

    protected $primaryKey = 'idA'; // Clé primaire

    public $timestamps = false; // Désactiver les timestamps si la table ne les utilise pas

    protected $fillable = [
        'date',
        'reason',
        'duration',
        'employeeid',
    ];

    /**
     * Relation avec le modèle Employee.
     * Un absence appartient à un employé.
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employeeid', 'employeeid');
    }
}

