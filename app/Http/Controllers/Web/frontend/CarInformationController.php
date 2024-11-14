<?php

namespace App\Http\Controllers\Web\frontend;

use App\Http\Controllers\Controller;
use App\Models\Car;
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
            'full_name' => 'required',
            'contact_number' => 'required',
            'vin_number' => 'required',
            'year' => 'required',
            'make' => 'required',
            'model' => 'required',
            'mileage' => 'required',
            'equipment' => 'required',
            'location' => 'required',
            'title_location' => 'required',
            'state' => 'required',
            'title_status' => 'required',
            'price_unit' => 'required',
            'bit_price' => 'required',
            'image' => 'required',
        ]);

        $this->car = new Car();
        $image = null;
        if ($request->hasFile('image')) {
            $randomize = rand(111111, 999999);
            $extension = $request->file('image')->getClientOriginalExtension();
            $filename = $randomize . '.' . $extension;
            $request->file('image')->move('car/images/', $filename);
            $image = 'car/images/' . $filename;
        }


        $this->car->user_id = auth()->user()->id;
        $this->car->car_category_id = $request->category_id;
        $this->car->car_transmission_id = $request->transmission_id;
        $this->car->full_name = $request->full_name;
        $this->car->contact_number = $request->contact_number;
        $this->car->vin_number = $request->vin_number;
        $this->car->year = $request->year;
        $this->car->manufacturer = $request->make;
        $this->car->model = $request->model;
        $this->car->mileage = $request->mileage;
        $this->car->equipment = $request->equipment;
        $this->car->is_modified = $request->is_modified;
        $this->car->modification_details = $request->modification_details;
        $this->car->is_any_mechanical_cosmetic_flaws = $request->is_any_mechanical_cosmetic_flaws;
        $this->car->mechanical_cosmetic_flaws_details = $request->details_of_any_mechanical_cosmetic_flaws;
        $this->car->location = $request->location;
        $this->car->is_sales_elsewhere = $request->is_sales_elsewhere;
        $this->car->title_location = $request->title_location;
        $this->car->state = $request->state;
        $this->car->is_title_in_name = $request->is_title_in_name;
        $this->car->title_status = $request->title_status;
        $this->car->is_set_min_price = $request->is_set_min_price;
        $this->car->price_unit = $request->price_unit;
        $this->car->bit_price = $request->bit_price;
        $this->car->image = $image;
        $this->car->save();

        return redirect()->route('auctions')->with('t-success', 'Car Registration successful!');
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
