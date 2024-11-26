<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees'; // Nom de la table

    protected $primaryKey = 'employeeid'; // Clé primaire

    public $timestamps = false; // Désactiver les timestamps si la table ne les utilise pas

    protected $fillable = [
        'city',
        'address',
        'position',
        'salary',
        'idU', // Référence à l'utilisateur
    ];

    /**
     * Relation avec le modèle User.
     * Un employé est lié à un utilisateur.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'idU', 'idU');
    }

    /**
     * Relation avec le modèle Absence.
     * Un employé peut avoir plusieurs absences.
     */
    public function absences()
    {
        return $this->hasMany(Absence::class, 'employeeid', 'employeeid');
    }
}
