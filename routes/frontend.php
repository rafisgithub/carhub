<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Web\frontend\HomeController;
use Illuminate\Support\Facades\Route;



Route::get('/',[HomeController::class,'index'])->name('home');


Route::middleware('auth','verified')->group(function () {

    Route::get('auctions',[HomeController::class,'auctions'])->name('auctions');
    Route::get('cars-and-bids',[HomeController::class,'getCarsAndbid'])->name('cars-and-bids');
    Route::get('sell-car',[HomeController::class,'sellCar'])->name('sell-car');
    Route::get('car-details',[HomeController::class,'getCarDetails'])->name('car-details');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



    Route::post('/store/car/info',[HomeController::class,'storeCarInfo'])->name('store.car.information');

});






