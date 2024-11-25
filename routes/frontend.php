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

        Route::get('/auctions', action: 'auctions')->name('auctions');
        Route::get('/cars-and-bids', 'getCarsAndbid')->name('cars-and-bids');
        Route::get('/sell-car', 'sellCar')->name('sell-car');
        Route::get('/showing-car-details/{id}', 'getCarDetails')->name('car.details');
        //get.categories
        Route::get('/get-categories', 'getCategories')->name('get.categories');
        //get car brands
        Route::get('/get-car-brands', 'getCarBrands')->name('get.car.brands');
        //get.all.auctions
        Route::get('/get-all-auctions', 'getAllAuctions')->name('get.all.auctions');
        // get all car models
        Route::get('/get-car-models', 'getCarModels')->name('get.car.models');
        // filter car auction

        Route::get('/filter-car-auction', 'filterCarAuction')->name('filter.car.auction');
            // ending soon auctions
        Route::get('/ending-soon-auctions', 'endingSoonAuctions')->name('ending.soon.auctions');
        // newly listed auctionsq
        Route::get('/newly-listed-auctions', 'newlyListedAuctions')->name('newly.listed.auctions');
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






