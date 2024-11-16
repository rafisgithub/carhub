<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarTransmissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $transmissions = [
            'Automatic',
            'Manual',
            'Semi-Automatic',
            'Dual-Clutch Transmission',
            'Continuously Variable Transmission',
            'Automated Manual Transmission',
            'Direct-Shift Gearbox',
            'Tiptronic',
            'PDK',
        ];

        foreach ($transmissions as $transmission) {         
            \App\Models\CarTransmission::create([
                'transmission_type' => $transmission,
            ]);
        }
    }
}
