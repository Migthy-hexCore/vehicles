<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralDirection extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'program_code',
        'status',
    ];
    
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
