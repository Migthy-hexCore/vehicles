<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employee_name' => 'CIFUENTES PADILLA JUANA ERIKA',
            'employee_number' =>'59973',
            'level_id' => '10',
            'position_name' =>'COORDINADOR/A OPERATIVO/A B',
            'dependency_id' => 1,
            'general_direction_id' => 1,
        ];
    }
}
