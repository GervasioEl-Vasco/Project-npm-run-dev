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

        for ($i = 1; $i <= 5; $i++) {
            User::updateOrCreate([
                'email' => "customer{$i}@pinglaundry.com",
            ], [
                'name' => "Customer {$i}",
                'password' => bcrypt('password123'),
                'phone' => '0812345679' . $i,
                'address' => "Jl. Customer No. {$i}",
                'role' => 'customer',
                'is_active' => true,
            ]);
        }
    }
}
