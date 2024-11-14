<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Web\frontend\CarInformationController;
use App\Http\Controllers\Web\frontend\HomeController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\frontend\UserInforamationController;



Route::get('/',[HomeController::class,'index'])->name('home');


Route::middleware('auth','verified')->group(function () {

    Route::get('auctions',[HomeController::class,'auctions'])->name('auctions');
    Route::get('cars-and-bids',[HomeController::class,'getCarsAndbid'])->name('cars-and-bids');
    Route::get('sell-car',[HomeController::class,'sellCar'])->name('sell-car');
    Route::get('showing-car-details/{id}',[HomeController::class,'getCarDetails'])->name('car.details');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



    Route::resource('cars', CarInformationController::class);

    // user profile routes

    Route::get('user-profile',[UserInforamationController::class,'userProfile'])->name('profile.index');
    Route::post('user/store/profile',[UserInforamationController::class,'updateProfile'])->name('user.store.profile');
});






