<?php

use App\Http\Controllers\Web\backend\CarManageController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\backend\HomeController;
use App\Http\Controllers\Web\backend\CarCategoryController;
use App\Http\Controllers\Web\backend\SellerTypeController;
use App\Http\Controllers\Web\backend\TransmissionController;

// Admin Middleware
Route::middleware(['isAdmin', 'auth', 'verified'])->group(function () {

    Route::controller(HomeController::class)->group(function() {
        // Dashboard Route
        Route::get('/dashboard', 'index')->name('dashboard');

        // About section routes
        Route::prefix('about')->group(function() {
            Route::get('/', 'about')->name('about');
            Route::post('/store-section', 'storeAboutSection')->name('store.about.section');

            // Features
            Route::get('/features', 'aboutFeatures')->name('about.features');
            Route::post('/store/features', 'storeAboutFeatures')->name('store.features');

            // Buying a Car
            Route::get('/buy-a-car', 'buyingACar')->name('about.buying.a.car');
            Route::post('/buy-a-car', 'SaveBuyingCarInfo')->name('buying.a.car');

            // Selling a Car
            Route::get('/sell-a-car', 'sellACar')->name('about.sell.a.car');
            Route::post('/sell-a-car', 'SaveSellCarInfo')->name('store.a.car.content');

            // Finalizing the Sell
            Route::get('/finalize/the/sell', 'finalizeTheSell')->name('about.finalize.the.sell');
            Route::post('/finalize/the/sell', 'storeFinalizeTheSell')->name('store.finalize.the.sell');

            // Social Media Link
            Route::get('/add/social-media', 'addSocialMedia')->name('about.add.social.media.link');

            // Frontend Banner
            Route::get('/frontend/banner', 'frontendBanner')->name('about.frontend.banner');
            Route::post('/frontend/banner', 'storeFrontendBanner')->name('store.frontend.banner');
        });

        // SEO message routes
        Route::prefix('seo')->group(function() {
            Route::get('/message', 'ceoMessage')->name('seo-message');
            Route::post('/store-message', 'storeCeoMessage')->name('store.ceo.message');
        });
    });

    // Car Category
    Route::resource('car-category', CarCategoryController::class);

    // Car Transmission
    Route::resource('car-transmission', TransmissionController::class);
    // Seller Type
    Route::resource('seller-type', SellerTypeController::class);

    // Car Management Routes
    Route::resource('car-management', CarManageController::class);
    Route::post('change-status/{id}',[CarManageController::class,'changeStatus'])->name('change.status');
});
