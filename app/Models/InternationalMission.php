<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InternationalMission extends Model
{
    //

    protected $fillable = [
        'employeeid',
        'user_id',
        'mission_id',
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

}
