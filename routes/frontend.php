<?php

use App\Http\Controllers\Web\frontend\HomeController;
use Illuminate\Support\Facades\Route;



Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('auctions',[HomeController::class,'auctions'])->name('auctions');
Route::get('cars-and-bids',[HomeController::class,'getCarsAndbid'])->name('cars-and-bids');
Route::get('sell-car',[HomeController::class,'sellCar'])->name('sell-car');
Route::get('car-details',[HomeController::class,'getCarDetails'])->name('car-details');


