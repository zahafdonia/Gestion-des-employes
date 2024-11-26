<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemandeConge extends Model
{
    use HasFactory;

    protected $table = 'demande_conges';
    protected $primaryKey = 'id_conge';
    public $timestamps = true;

    protected $fillable = [
        'employeeId',
        'date_debut',
        'date_fin',
        'type',
        'commentaire',
        'statut',
    ];

    /**
     * Relation : une demande de congé appartient à un employé.
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employeeId', 'employeeId');
    }

    
}
