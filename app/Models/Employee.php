<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employee';  // Nom de la table
    protected $primaryKey = 'employeeId';  // Clé primaire
    public $timestamps = false;

    protected $fillable = [
        'idU', 
        'address', 
        'city', 
        'position',
        'salary',
        
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'idU', 'idU');
    }

    public function performances()
    {
        return $this->hasMany(Performance::class, 'employeeId', 'employeeId');
    }

    public function absences()
    {
        return $this->hasMany(Absence::class, 'employeeId', 'employeeId');
    }

    public function demandesConge()
    {
        return $this->hasMany(DemandeConge::class, 'employeeId', 'employeeId');
    }
}