<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Sedan',
            'Coupe',
            'SUV',
            'Crossover',
            'Convertible',
            'Hatchback',
            'Wagon',
            'Van',
            'Truck',
            'Minivan',
            'Bus',
            'Pickup',
            'Limousine',
            'Cabriolet',
            'Roadster',
            'Targa',
        ];

        foreach ($categories as $category) {
            \App\Models\CarCategory::create([
                'category' => $category,
            ]);
        }
    }
}
