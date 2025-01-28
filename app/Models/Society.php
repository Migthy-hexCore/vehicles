<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Society extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
    ];

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }
}
