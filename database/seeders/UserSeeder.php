<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@pinglaundry.com',
            'password' => bcrypt('password123'),
            'phone' => '08123456789',
            'address' => 'Jl. Laundry No. 1',
            'role' => 'admin',
            'is_active' => true,
        ]);

        // Create staff user
        User::create([
            'name' => 'Staff User',
            'email' => 'staff@pinglaundry.com',
            'password' => bcrypt('password123'),
            'phone' => '08123456790',
            'address' => 'Jl. Laundry No. 2',
            'role' => 'staff',
            'is_active' => true,
        ]);

        // Create sample customers
        User::factory(5)->create([
            'role' => 'customer',
        ]);
    }
}
