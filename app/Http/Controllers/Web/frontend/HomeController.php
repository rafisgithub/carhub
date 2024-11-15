<?php

namespace App\Http\Controllers\Web\frontend;

use App\Http\Controllers\Controller;
use App\Models\AuctionTime;
use App\Models\Car;
use App\Models\CarCategory;
use App\Models\CarTransmission;
use App\Models\SellerType;
use App\Models\CMS;
use App\Models\Feature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\FeatureSet;

class HomeController extends Controller
{
    public $allcars,$auctionTime,$carCategories,$carTransmissions,$carDetails,$sellerTypes;
    public function index()
    {
        $this->allcars = Car::with('auctionTime')->with('carCategory')->with('carTransmission')->where('status', 1)->get();

        return view('frontend.layouts.home.index',[
            'allcars' => $this->allcars,
        ]);
    }
    public function auctions() {
        $this->allcars = Car::where('status', 1)->get();

        return view('frontend.layouts.auctions.auctions',[
            'allcars' => $this->allcars,
        ]);
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
        $this->sellerTypes = SellerType::all();

        if ($request->ajax()) {
            $this->carCategories = CarCategory::all();
            $this->carTransmissions = CarTransmission::all();
            return response()->json([
                'carCats' =>  $this->carCategories,
                'carTrans' => $this->carTransmissions,

            ]);
        }

        return view('frontend.layouts.sell-car.sell-car',[

            'sellerTypes' => $this->sellerTypes,
        ]);
    }

    public function getCarDetails($id) {
        $this->carDetails = Car::with('auctionTime')->with('carCategory')->with('carTransmission')->with('user')->where('id',$id)->first();
        // dd($this->carDetails);
        return view('frontend.layouts.car-details.car-details',[
            'carDetails' => $this->carDetails,
        ]);
    }

}
