<?php

namespace App\Http\Controllers\Web\frontend;

use App\Http\Controllers\Controller;
use App\Models\AuctionTime;
use App\Models\BidderRegistration;
use App\Models\Car;
use App\Models\CarBrand;
use App\Models\CarCategory;
use App\Models\carModel;
use App\Models\CarTransmission;
use App\Models\SellerType;
use App\Models\CMS;
use App\Models\Feature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpSpreadsheet\Calculation\DateTimeExcel\YearFrac;
use Ramsey\Uuid\FeatureSet;

class HomeController extends Controller
{
    public $allcars,$auctionTime,$carCategories,$carTransmissions,$carDetails,$sellerTypes,$carBrands,$carModels;
    public function index()
    {
        $this->allcars = Car::with('auctionTime')->with('carCategory')->with('carTransmission')->where('status', 1)->limit(4)->get();

        return view('frontend.layouts.home.index',[
            'allcars' => $this->allcars,
        ]);
    }
    public function auctions(Request $request) {


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
        $this->sellerTypes = SellerType::all();
        $this->carCategories = CarCategory::all();
        $this->carTransmissions = CarTransmission::all();

        return view('frontend.layouts.sell-car.sell-car',[

            'sellerTypes' => $this->sellerTypes,
            'carCategories' => $this->carCategories,
            'carTransmissions' => $this->carTransmissions,
        ]);
    }

    public function getCarDetails($id) {
        $this->carDetails = Car::with('auctionTime')->with('carCategory')->with('carTransmission')->with('sellerType')->with('carImages')->with('carVideos')->with('user.userPublicInformation')->where('id',$id)->first();
        // dd ($this->carDetails);
        $autionsEndingSoon = Car::where('status', 1)->orderBy('id', 'asc')->limit(4)->with('auctionTime')->get();
        // dd($autionsEndingSoon);
        $heightestBit = BidderRegistration::where('car_id', $id)->orderBy('bit_amount', 'desc')->first();
        $totalBit = BidderRegistration::where('car_id', $id)->count();
        return view('frontend.layouts.car-details.car-details',[
            'carDetails' => $this->carDetails,
            'autionsEndingSoon' => $autionsEndingSoon,
            'heightestBit' => $heightestBit,
            'totalBit' => $totalBit,
        ]);
    }

    public function getCategories() {
        $this->carCategories = CarCategory::all();
        return response()->json([
            'status' => true,
            'data' => $this->carCategories,
        ]);
    }

    public function getAllAuctions() {
        $this->allcars = Car::with('auctionTime')->with('carCategory')->with('carTransmission')->where('status', 1)->get();
        return response()->json([
            'status' => true,
            'data' => $this->allcars,
        ]);
    }

    public function filterCarAuction(Request $request) {

        if($request->category_id) {
            $this->allcars = Car::with('auctionTime')->with('carCategory')->with('carTransmission')->where('status', 1)->where('car_category_id', $request->category_id)->get();
        }
        if($request->year) {
            $this->allcars = Car::with('auctionTime')->with('carCategory')->with('carTransmission')->where('status', 1)->where('year', $request->year)->get();
        }

        if($request->brand){
            $this->allcars = Car::with('auctionTime')->with('carCategory')->with('carTransmission')->where('status', 1)
            ->where('manufacturer','like', '%'. $request->brand .'%')->get();
        }

        if($request->model){
            $this->allcars = Car::with('auctionTime')->with('carCategory')->with('carTransmission')->where('status', 1)
            ->where('model','like', '%'. $request->model .'%')->get();
        }

        if($request->price == 'below 10000') {
            $this->allcars = Car::with('auctionTime')->with('carCategory')->with('carTransmission')->where('status', 1)->where('bit_price', '<', 10000)->get();
        }

        if($request->price == '10000-20000') {
            $this->allcars = Car::with('auctionTime')->with('carCategory')->with('carTransmission')->where('status', 1)->where('bit_price', '>=', 10000)->where('bit_price', '<=', 20000)->get();
        }
        if($request->price == '20000-30000') {
            $this->allcars = Car::with('auctionTime')->with('carCategory')->with('carTransmission')->where('status', 1)->where('bit_price', '>=', 20000)->where('bit_price', '<=', 30000)->get();
        }
        if($request->price == '30000-40000') {
            $this->allcars = Car::with('auctionTime')->with('carCategory')->with('carTransmission')->where('status', 1)->where('bit_price', '>=', 30000)->where('bit_price', '<=', 40000)->get();
        }
        if($request->price == '40000-50000') {
            $this->allcars = Car::with('auctionTime')->with('carCategory')->with('carTransmission')->where('status', 1)->where('bit_price', '>=', 40000)->where('bit_price', '<=', 50000)->get();
        }

        if($request->price == '50up') {
            $this->allcars = Car::with('auctionTime')->with('carCategory')->with('carTransmission')->where('status', 1)->where('bit_price', '>', 50000)->get();
        }

        return response()->json([
            'status' => true,
            'data' => $this->allcars,
        ]);

    }

    // get car brands

    public function getCarBrands() {
        $this->carBrands = CarBrand::all();
        return response()->json([
            'status' => true,
            'data' => $this->carBrands,
        ]);
    }

    // get car models

    public function getCarModels() {
        $this->carModels = carModel::all();
        return response()->json([
            'status' => true,
            'data' => $this->carModels,
        ]);
    }


    public function endingSoonAuctions() {
        $this->allcars = Car::with('auctionTime')->with('carCategory')->with('carTransmission')->where('status', 1)->orderBy('id', 'asc')->limit(4)->get();
        return response()->json([
            'status' => true,
            'data' => $this->allcars,
        ]);
    }

    public function newlyListedAuctions() {
        $this->allcars = Car::with('auctionTime')->with('carCategory')->with('carTransmission')->where('status', 1)->orderBy('id', 'desc')->limit(4)->get();
        return response()->json([
            'status' => true,
            'data' => $this->allcars,
        ]);
    }
}
