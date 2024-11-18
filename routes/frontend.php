<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Web\frontend\BidderRegistrationController;
use App\Http\Controllers\Web\frontend\CarInformationController;
use App\Http\Controllers\Web\frontend\HomeController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\frontend\UserInforamationController;
use App\Http\Controllers\Web\frontend\StripePaymentController;



Route::get('/',[HomeController::class,'index'])->name('home');


Route::middleware('auth','verified')->group(function () {


    Route::controller(HomeController::class)->group(function() {

        Route::get('/auctions', 'auctions')->name('auctions');
        Route::get('/cars-and-bids', 'getCarsAndbid')->name('cars-and-bids');
        Route::get('/sell-car', 'sellCar')->name('sell-car');
        Route::get('/showing-car-details/{id}', 'getCarDetails')->name('car.details');

    });




    Route::resource('cars', CarInformationController::class);

    // user profile routes
    Route::controller(UserInforamationController::class)->group(function() {
        Route::get('user-profile', 'userProfile')->name('profile.index');
        Route::post('user/store/profile', 'updateProfile')->name('user.store.profile');
    });
    // Stripe Payment
    Route::controller(StripePaymentController::class)->group(function(){
        Route::get('stripe-payment-form','openStripePayment')->name('stripe.index');
        Route::post('stripe-payment','stripePayment')->name('stripe.payment');

    });

    // get user balance

    Route::get('user-balance', [StripePaymentController::class,'getUserBalance'])->name('get.user.balanace');

    // Bidder Registration
    Route::post('bidder-registration', [BidderRegistrationController::class,'bidderRegistration'])->name('bidder.register');



});






