<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employee';  // Nom de la table
    protected $primaryKey = 'employeeId';  // Clé primaire
    public $timestamps = false;  // Désactiver les timestamps si non nécessaires

    protected $fillable = [
        'idU',
        'address',
        'city',
        'position',
        'salary',
    ];

    // Définition de la relation avec l'utilisateur
    public function user()
    {
        return $this->belongsTo(User::class, 'idU', 'idU');
    }

    // Relation avec les performances de l'employé
    public function performances()
    {
        return $this->hasMany(Performance::class, 'employeeId', 'employeeId');
    }

    // Relation avec les absences de l'employé
    public function absences()
    {
        return $this->hasMany(Absence::class, 'employeeId', 'employeeId');
    }
}
