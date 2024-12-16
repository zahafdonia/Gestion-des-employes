<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternationalMission extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'mission_id',
        'user_id',
        'superviseur',
        'purpose',
        'start_date',
        'end_date',
        'destination',
        'expenses',
        'interim',
        'mission_report',
        'receipt_path',
        'status',
        'report_details',
        'report_date',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
