<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Models\User;

class RoleSeeder extends Seeder
{
    public function run(): void 
    {
        // Ensure roles exist
        $customerRole = Role::firstOrCreate(['name' => 'Customer', 'guard_name' => 'web']);
        $adminRole = Role::firstOrCreate(['name' => 'super_admin', 'guard_name' => 'web']);
        
        // Assign roles to specific users based on email
        $customerUser = User::where('email', 'cust1@carshop.com')->first();
        $adminUser = User::where('email', 'admin@example.com')->first();

        if ($customerUser) {
            $customerUser->assignRole($customerRole);
        }

        if ($adminUser) {
            $adminUser->assignRole($adminRole);
        }
    }
}