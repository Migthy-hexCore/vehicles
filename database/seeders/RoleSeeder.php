<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            'super admin' => Permission::all(),
            'admin' => Permission::whereNotIn('id', [2])->get(),
            'user' => Permission::whereIn('id', [3, 9, 14, 19, 24, 29, 34, 38, 43, 48, 53])->get(),
        ];

        foreach ($roles as $roleName => $permissions) {
            $role = Role::firstOrCreate(['name' => $roleName]);
            $role->syncPermissions($permissions);
        }

        $userAdmin = User::find(1);
        $userAdmin->assignRole('super admin');

        User::where('id', '!=', 1)->each(function ($user) {
            $user->assignRole('user');
        });
    }
}
