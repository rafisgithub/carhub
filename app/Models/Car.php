<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Car extends Model
{

    use HasFactory;

    protected $fillable = [
        'user_id',
        'car_category_id',
        'car_transmission_id',
        'full_name',
        'contact_number',
        'vin_number',
        'year',
        'manufacturer',
        'model',
        'mileage',
        'equipment',
        'is_modified',
        'modification_details',
        'is_any_mechanical_cosmetic_flaws',
        'mechanical_cosmetic_flaws_details',
        'location',
        'is_sales_elsewhere',
        'title_location',
        'state',
        'is_title_in_name',
        'title_status',
        'is_set_min_price',
        'price_unit',
        'bit_price',
        'image',
        'status',

    ];


    public function user()
    {
        return $this->belongsTo(related: User::class);
    }

    public function auctionTime()
    {
        return $this->hasOne(AuctionTime::class);
    }

    public function carCategory()
    {
        return $this->belongsTo(CarCategory::class);
    }

    public function carTransmission()
    {
        return $this->belongsTo(CarTransmission::class);
    }

    public function sellerType()
    {
        return $this->belongsTo(SellerType::class);
    }

    public function carImages()
    {
        return $this->hasMany(CarImage::class);
    }

    public function carVideos()
    {
        return $this->hasMany(CarVideo::class);
    }

}
