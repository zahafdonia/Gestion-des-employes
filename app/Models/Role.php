<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    use HasFactory;

    protected $table = 'role';
    protected $primaryKey = 'idR';
    public $timestamps = false;

    protected $fillable = [
        'nomR',
    ];

    // Relation avec les utilisateurs
    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'idR');
    }
}
