<?php

namespace App\Http\Controllers\Web\frontend;

use App\Http\Controllers\Controller;
use App\Models\CMS;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.layouts.home.index');
    }
    public function auctions() {
        return view('frontend.layouts.auctions.auctions');
    }

    public function getCarsAndbid() {
        $data = CMS::where('id', 1)->first();
        // dd($data);
        return view('frontend.layouts.cars-and-bids.cars-and-bids',compact('data'));
    }

    public function sellCar() {
        return view('frontend.layouts.sell-car.sell-car');
    }

    public function getCarDetails() {
        return view('frontend.layouts.car-details.car-details');
    }
}
