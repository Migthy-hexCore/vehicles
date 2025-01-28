<?php

namespace Database\Seeders;

use App\Models\Agency;
use App\Models\Area;
use App\Models\Brand;
use App\Models\Vehicle;
use App\Models\Dependency;
use App\Models\Division;
use App\Models\Employee;
use App\Models\GeneralDirection;
use App\Models\Level;
use App\Models\Society;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Types\Relations\Role;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Cesar Alejandro Jaramillo Ramirez',
            'email' => 'cesarjaramillormz@gmail.com',
            'password' => bcrypt('cesar123')
        ]);

        Society::factory()->create([
            'name' => 'GEG',
            'status' => 1,
        ]);

        Division::factory()->create([
            'name' => '05',
            'status' => 1,
        ]);

        Division::factory()->create([
            'name' => '06',
            'status' => 0,
        ]);

        Agency::factory()->create([
            'name' => 'CHEVROLET DEL PARQUE, S.A. DE .C.V',
        ]);

        Brand::factory()->create([
            'name' => 'CHEVROLET',
        ]);

        Level::factory()->create([
            'level' => 'HON ASIM',
        ]);

        Level::factory()->createMany(
            array_map(fn($i) => ['level' => $i], range(1, 22))
        );

        // Factories echos con faker
        Vehicle::factory()->create();

        User::factory(10)->create();
        
        Agency::factory(10)->create();

        Brand::factory(10)->create();

        Society::factory(10)->create();

        Dependency::factory(10)->create();

        GeneralDirection::factory(10)->create();

        Area::factory(10)->create();

        Employee::factory()->create();

        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
        ]);
    }
}
