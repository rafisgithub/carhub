<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarBrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            'Acura',
            'BMW',
            'Bugatti',
            'Buick',
            'Ferrari',
            'Fiat',
            'Ford',
            'Geely',
            'General Motors',
            'GMC',
            'Honda',
            'Hyundai',
            'Infiniti',
            'Jaguar Land Rover',
            'Jeep',
            'Kia',
            'Tesla',
            'Toyota',
            'Volkswagen',
            'Volvo',
        ];

        foreach ($brands as $brand) {
            \App\Models\CarBrand::create([
                'name' => $brand,
            ]);
        }
    }
}
