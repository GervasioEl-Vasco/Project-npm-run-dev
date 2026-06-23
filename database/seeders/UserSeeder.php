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
        User::updateOrCreate([
            'email' => 'admin@pinglaundry.com',
        ], [
            'name' => 'Admin User',
            'password' => bcrypt('password123'),
            'phone' => '08123456789',
            'address' => 'Jl. Laundry No. 1',
            'role' => 'admin',
            'is_active' => true,
        ]);

        // Create staff user
        User::updateOrCreate([
            'email' => 'staff@pinglaundry.com',
        ], [
            'name' => 'Staff User',
            'password' => bcrypt('password123'),
            'phone' => '08123456790',
            'address' => 'Jl. Laundry No. 2',
            'role' => 'staff',
            'is_active' => true,
        ]);

            User::updateOrCreate([
                'email' => "customer@pinglaundry.com",
            ], [
                'name' => "Customer",
                'password' => bcrypt('password123'),
                'phone' => '08123456790',
                'address' => "Jl. Customer No. 1",
                'role' => 'customer',
                'is_active' => true,
            ]);
        
    }
}
