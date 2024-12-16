<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Employee extends Model
{
    use HasFactory;
    use Notifiable;


    protected $fillable = [
        'employee_id',
        'name',
        'city',
        'address',
        'position',
        'salary',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function absences()
    {
        return $this->hasMany(Absence::class);
    }

    public function localMissions()
    {
        return $this->hasMany(LocalMission::class);
    }

    public function internationalMissions()
    {
        return $this->hasMany(InternationalMission::class);
    }
}
