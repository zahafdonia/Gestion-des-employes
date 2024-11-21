<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Absence extends Model
{
    use HasFactory;

    protected $table = 'absence';
    protected $primaryKey = 'idA';
    public $timestamps = false;

    protected $fillable = [
        'employeeId',
        'date', 
        'reason',
        'duration',
    ];

    // Relation avec l'employé
    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'employeeId');
    }
}

