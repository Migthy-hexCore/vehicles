<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            'access dashboard',

            'manage users',
           /*  'view users',
            'create users',
            'update users',
            'delete users', */

            'manage assingments',
            
            'manage vehicles',
           /*  'view vehicles',
            'create vehicles',
            'update vehicles',
            'delete vehicles', */

            'manage societies',
            /* 'view societies',
            'create societies',
            'update societies',
            'delete societies', */

            'manage divisions',
           /*  'view divisions',
            'create divisions',
            'update divisions',
            'delete divisions', */

            'manage agencies',
           /*  'view agencies',
            'create agencies',
            'update agencies',
            'delete agencies', */

            'manage brands',
           /*  'view brands',
            'create brands',
            'update brands',
            'delete brands', */
            
            'manage employees',
            /* 'view employees',
            'create employees',
            'update employees', */

            'manage levels',
           /*  'view levels',
            'create levels',
            'update levels',
            'delete levels', */

            'manage dependencies',
           /*  'view dependencies',
            'create dependencies',
            'update dependencies',
            'delete dependencies', */

            'manage directions',
            /* 'view directions',
            'create directions',
            'update directions',
            'delete directions', */

            'manage areas',
           /*  'view areas',
            'create areas',
            'update areas',
            'delete areas', */
        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission
            ]);
        }

        
    }
}
