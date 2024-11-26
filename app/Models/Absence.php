<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    use HasFactory;

    // Nom de la table
    protected $table = 'absences';

    // Champs remplissables
    protected $fillable = [
        'date',
        'reason',
        'duration',
        'id_employee',
    ];

    // Relation avec Employee
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'id_employee');
    }
}
