<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Performance extends Model
{
    use HasFactory;

    protected $table = 'performance';
    protected $primaryKey = 'idP';
    public $timestamps = false;

    protected $fillable = [
        'employeeId',
        'data',
        'rating', 
    ];

    // Relation avec l'employé
    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'employeeId');
    }
}
