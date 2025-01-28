<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
    ];

    //relacion con empleados
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
    
}
