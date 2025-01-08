<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CarListingController;

Route::get('/', [CarListingController::class, 'showHomepage'])->name('home');

// sell car form page
Route::get('/sell-my-car', function () {
    return view('sellcar');  // Sell Car page route
})->name('sell.my.car');  // Named route


Route::get('/car-listing', [CarListingController::class, 'index'])->name('car.listing');

// Car Detail Route
Route::get('/car-detail/{id}', [CarListingController::class, 'show'])->name('car.detail');


// contact us page
Route::get('/contact-us', function () {
    return view('contactus');  // Contact Us page route
})->name('contact.us');  // Named route







// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth-user')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::get('/categories', [AdminController::class, 'categories'])->name('categories');
});

require __DIR__ . '/auth.php';
