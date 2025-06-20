<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Call RoleSeeder first to create roles
        $this->call([RoleSeeder::class]);

        // Seed users after roles exist
        $this->seedUsers();
    }

    private function seedUsers(): void
    {
        // Create Admin user if not exists
        $adminEmail = 'admin@carshop.com';
        if (! User::where('email', $adminEmail)->exists()) {
            $admin = User::create([
                'name' => 'Admin',
                'email' => $adminEmail,
                'password' => bcrypt('password'),
            ]);
            $admin->assignRole('super_admin');
        }

        // Create Mahasiswa user if not exists
        $custEmail = 'cust1@carshop.com';
        if (! User::where('email', $custEmail)->exists()) {
            $cust = User::create([
                'name' => 'Customer1',
                'email' => $custEmail,
                'password' => bcrypt('password'),
            ]);
            $cust->assignRole('Customer');
        }
    }
}