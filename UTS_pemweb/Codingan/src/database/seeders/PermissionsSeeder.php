<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsSeeder extends Seeder
{
    public function run()
    {
        // Create permissions if they don't exist
        $permissions = [
            'view_schedules',
            'view_any_schedules'
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Get or create the 'mahasiswa' role
        $role = Role::firstOrCreate(['name' => 'Customer']);

        // Assign the permissions to the 'mahasiswa' role
        $role->givePermissionTo($permissions);
    }
}
