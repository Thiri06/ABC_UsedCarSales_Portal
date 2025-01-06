<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');  // Home page route
})->name('home');  // Named route for easy navigation

Route::get('/sell-my-car', function () {
    return view('sellcar');  // Sell Car page route
})->name('sell.my.car');  // Named route

Route::get('/buy-car', function () {
    return view('buycarlist');  // Buy Car page route
})->name('buy.car');  // Named route

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
