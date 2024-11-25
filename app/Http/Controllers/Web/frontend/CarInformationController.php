<?php

namespace App\Http\Controllers\Web\frontend;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\CarImage;
use App\Models\CarVideo;
use Illuminate\Http\Request;

class CarInformationController extends Controller
{
    public $car;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // dd($request->all());
    $request->validate([
        'category_id' => 'required',
        'transmission_id' => 'required',
        'seller_type_id' => 'required',
        'seller_type_id' => 'required',
        'full_name' => 'required',
        'contact_number' => 'required|',
        'vin_number' => 'required',
        'year' => 'required',
        'make' => 'required',
        'model' => 'required',
        'mileage' => 'required',
        'body_style' => 'required',
        'exterior_color' => 'required',
        'interior_color' => 'required',
        'engine' => 'required',
        'equipment' => 'required',
        'location' => 'required',
        'title_location' => 'required',
        'price_unit' => 'required',
        'bit_price' => 'required',
        'files.*' => 'nullable',
    ]);

    $car = new Car();

    $car->user_id = auth()->user()->id;
    $car->car_category_id = $request->category_id;
    $car->car_transmission_id = $request->transmission_id;
    $car->seller_type_id = $request->seller_type_id;
    $car->full_name = $request->full_name;
    $car->contact_number = $request->contact_number;
    $car->vin_number = $request->vin_number;
    $car->year = $request->year;
    $car->manufacturer = $request->make;
    $car->model = $request->model;
    $car->mileage = $request->mileage;
    $car->body_style = $request->body_style;
    $car->exterior_color = $request->exterior_color;
    $car->interior_color = $request->interior_color;
    $car->engine = $request->engine;
    $car->equipment = $request->equipment;
    $car->is_modified = $request->is_modified;
    $car->modification_details = $request->modification_details;
    $car->is_any_mechanical_cosmetic_flaws = $request->is_any_mechanical_cosmetic_flaws;
    $car->mechanical_cosmetic_flaws_details = $request->details_of_any_mechanical_cosmetic_flaws;
    $car->location = $request->location;
    $car->is_sales_elsewhere = $request->is_sales_elsewhere;
    $car->title_location = $request->title_location;
    $car->state = $request->state;
    $car->is_title_in_name = $request->is_title_in_name;
    $car->title_status = $request->title_status;
    $car->is_set_min_price = $request->is_set_min_price;
    $car->price_unit = $request->price_unit;
    $car->bit_price = $request->bit_price;

    $car->save();

    if ($request->hasFile('files')) {
        $files = $request->file('files');
        $flag = true;
        foreach ($files as $index => $file) {
            $filename = rand(111111, 999999) . '.' . $file->getClientOriginalExtension();

            if (strpos($file->getMimeType(), 'image') !== false) {

                if( $flag) {
                    $thumbnailPath = 'car/thumbnails/';
                    $file->move(public_path($thumbnailPath), $filename);
                    $car->thumbnail = $thumbnailPath . $filename;
                    $car->save();
                    $flag = false;
                }else{

                    $path = 'car/images/';
                    $file->move(public_path($path), $filename);

                    CarImage::create([
                        'car_id' => $car->id,
                        'image' => $path . $filename,
                    ]);
                }
            } elseif (strpos($file->getMimeType(), 'video') !== false) {
                $path = 'car/videos/';
                $file->move(public_path($path), $filename);

                CarVideo::create([
                    'car_id' => $car->id,
                    'video' => $path . $filename,
                ]);
            }
        }
    }

    return redirect()->route('auctions')->with('t-success', 'Car registration successful!');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
