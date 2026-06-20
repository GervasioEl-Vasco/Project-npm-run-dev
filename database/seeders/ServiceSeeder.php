<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::create([
            'name' => 'Regular Laundry',
            'description' => 'Standard laundry service with basic washing and drying',
            'price' => 50000,
            'unit' => 'kg',
            'duration_days' => 2,
            'is_available' => true,
        ]);

        Service::create([
            'name' => 'Dry Cleaning',
            'description' => 'Professional dry cleaning for delicate clothes',
            'price' => 75000,
            'unit' => 'kg',
            'duration_days' => 3,
            'is_available' => true,
        ]);

        Service::create([
            'name' => 'Express Service',
            'description' => 'Quick turnaround laundry service',
            'price' => 100000,
            'unit' => 'kg',
            'duration_days' => 1,
            'is_available' => true,
        ]);

        Service::create([
            'name' => 'Iron Service',
            'description' => 'Professional ironing service',
            'price' => 30000,
            'unit' => 'kg',
            'duration_days' => 1,
            'is_available' => true,
        ]);

        Service::create([
            'name' => 'Carpet Cleaning',
            'description' => 'Deep cleaning for carpets and rugs',
            'price' => 150000,
            'unit' => 'item',
            'duration_days' => 2,
            'is_available' => true,
        ]);
    }
}
