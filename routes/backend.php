<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Web\backend\HomeController;


Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard')->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/about',[HomeController::class, 'about'])->name('about');
    Route::post('/store-about-section',[HomeController::class, 'storeAboutSection'])->name('store.about.section');

    Route::get('/seo-message',[HomeController::class,'ceoMessage'])->name('seo-message');
    Route::post('/store-seo-message',[HomeController::class,'storeCeoMessage'])->name('store.ceo.message');

    Route::get('/about/features',[HomeController::class,'aboutFeatures'])->name('about.features');
    Route::post('/store/features',[HomeController::class,'storeAboutFeatures'])->name(('store-features'));

    Route::get('/about/buy-a-car',[HomeController::class,'buyingACar'])->name('about.buying.a.car');
    Route::post('/about/buy-a-car',[HomeController::class,'SaveBuyingCarInfo'])->name('buying.a.car');

    Route::get('/about/sell-a-car',[HomeController::class,'sellACar'])->name('about.sell.a.car');
    Route::post('/about/sell-a-car',[HomeController::class,'SaveSellCarInfo'])->name('store.a.car.content');


    Route::get('/about/finalize/the/sell',[HomeController::class,'finalizeTheSell'])->name('about.finalize.the.sell');
    Route::post('/about/finalize/the/sell',[HomeController::class,'storeFinalizeTheSell'])->name('store.finalize.the.sell');

});
