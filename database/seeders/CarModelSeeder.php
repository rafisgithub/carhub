<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $models = [
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

        foreach ($models as $model) {
            \App\Models\carModel::create([
                'name' => $model,
            ]);
        }
    }
}
