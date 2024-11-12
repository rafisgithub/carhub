<?php

namespace App\Http\Controllers\Web\frontend;

use App\Http\Controllers\Controller;
use App\Models\CarCategory;
use App\Models\CMS;
use App\Models\Feature;
use Illuminate\Http\Request;
use Ramsey\Uuid\FeatureSet;

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
        $ceoData = CMS::where('id', 2)->first();
        $features =  Feature::all();
        $buyingCar = CMS::where('id', 3)->first();
        $sellingCar = CMS::where('id', 4)->first();
        $finalizeTheSell = CMS::where('id', 5)->first();
        return view('frontend.layouts.cars-and-bids.cars-and-bids', compact('data', 'ceoData', 'features', 'buyingCar', 'sellingCar','finalizeTheSell'));
    }

    public function sellCar(Request $request) {
        if ($request->ajax()) {

            $carCats = CarCategory::all();

            return response()->json([
                'data' => $carCats
            ]);
        }

        return view('frontend.layouts.sell-car.sell-car');
    }

    public function getCarDetails() {
        return view('frontend.layouts.car-details.car-details');
    }

    public function storeCarInfo(Request $request) {
       dd($request->all());
    }
}
