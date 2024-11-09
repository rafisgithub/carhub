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
    
});
