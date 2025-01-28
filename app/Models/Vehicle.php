<?php

namespace App\Models;

use App\Enums\VehicleStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'society_id',
        'fixed_asset_number',
        'control_number',
        'plates',
        'division_id',
        'serial_number',
        'invoice_number',
        'engine_number',
        'agency_id',
        'brand_id',
        'type',
        'model',
        'cylinders',
        'doors',
        'function',
        'passenger_capacity',
        'transmission',
        'color',
        'vehicle_level',
        'ownership',
        'acquisition_value',
        'purchase_document_number',
        'state_record',
        'assigned',
        'status',
    ];

    protected $casts = [
        'assigned' => VehicleStatus::class,
    ];

    public function agency()
    {
        return $this->belongsTo(Agency::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function society()
    {
        return $this->belongsTo(Society::class);
    }

    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }

    public function lastAssignment()
    {
        return $this->hasOne(Assignment::class)->latestOfMany();
    }
}
