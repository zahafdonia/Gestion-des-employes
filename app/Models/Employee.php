<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    // Spécifier le nom de la table
    protected $table = 'employees';
    protected $primaryKey = 'id_employee'; 
    public $timestamps = false;

    // Les champs remplissables
    protected $fillable = [
        'city',
        'address',
        'position',
        'salary',
        'id_user',
    ];

    // Relation avec l'utilisateur
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');

    }


    public function performances()
    {
        return $this->hasMany(Performances::class, 'employeeId', 'employeeId');
    }

    public function absences()
    {
        return $this->hasMany(Absences::class, 'employeeId', 'employeeId');
    }

}
