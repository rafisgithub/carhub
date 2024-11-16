<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarSellerTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sellerTypes = [
            'Owner',
            'Dealer',
            'Broker',
            'Auction',
            'Leasing',
            'Rental',
            'Bank',
            'Insurance',
            'Other',
        ];

        foreach ($sellerTypes as $sellerType) {
            \App\Models\SellerType::create([
                'seller_type' => $sellerType,
            ]);
        }
    }
}
