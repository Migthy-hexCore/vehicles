<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_name',
        'employee_number',
        'level_id',
        'position_name',
        'dependency_id',
        'general_direction_id',
        'status',
    ];

    public function dependency()
    {
        return $this->belongsTo(Dependency::class);
    }

    public function generalDirection()
    {
        return $this->belongsTo(GeneralDirection::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }
    
}
