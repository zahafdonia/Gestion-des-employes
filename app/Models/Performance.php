<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Performance extends Model
{
    use HasFactory;

    // Nom de la table
    protected $table = 'performances';

    // Champs remplissables
    protected $fillable = [
        'rating',
        'date',
        'id_employee',
    ];

    // Relation avec Employee
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'id_employee');
    }
}
