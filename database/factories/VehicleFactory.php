<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'society_id' => '1',
            'fixed_asset_number' => '200007770',
            'control_number' => '6902',
            'plates' => 'GG4518B',
            'division_id' => '1',
            'serial_number' => '8AFDT52D366497128',
            'invoice_number' => 'A15298',
            'engine_number' => '66497128',
            'agency_id' => 1,
            'brand_id' => 1,
            'type' => 'RANGER REG CAB XL',
            'model' => '2006',
            'cylinders' => '6',
            'doors' => '4',
            'function' => '1 TONELADA',
            'passenger_capacity' => '0',
            'transmission' => 'automatico',
            'color' => 'Plata',
            'vehicle_level' => 'Operativo',
            'ownership' => 'GOBIERNO DEL ESTADO DE GUANAJUATO',
            'acquisition_value' => '200000',
        ];
    }
}
