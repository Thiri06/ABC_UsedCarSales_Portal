<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CarListingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CarPostController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;

Route::get('/', [CarListingController::class, 'showHomepage'])->name('home');

// About Us page
Route::get('/about-us', function () {
    return view('aboutus');
})->name('about.us');

// sell car form page
// Route::get('/sell-my-car', function () {
//     return view('sellcar');  // Sell Car page route
// })->name('sell.my.car');  // Named route

// Route::get('/sell-car', [CarPostController::class, 'create'])->name('car.post.create');
// Route::post('/sell-car', [CarPostController::class, 'store'])->name('car.post.store');

// Car Listing Route
Route::get('/car-listing', [CarListingController::class, 'index'])->name('car.listing');

// Car Detail Route
Route::get('/car-detail/{id}', [CarListingController::class, 'show'])->name('car.detail');

// Contact Us page
Route::get('/contact-us', function () {
    return view('contactus');
})->name('contact.us');
Route::post('/contact-submit', [ContactController::class, 'submit'])->name('contact.submit');

// Dashboard and Sell Car Routes
// Route::middleware(['auth'])->group(function () {
//     Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
// });

// Route::middleware(['auth'])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

// Authenticated Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        $user = Auth::user();
        if ($user && $user->is_admin) {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('user.dashboard'); // Normal user dashboard
    })->name('dashboard');

    Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard');

    // Car Posts Routes
    Route::get('user/sell-cars', [UserController::class, 'create'])->name('user.create');
    Route::post('user/sell-cars', [UserController::class, 'store'])->name('user.store');

    // Other user routes for managing listings
    Route::get('user/your-listings', [UserController::class, 'yourListings'])->name('user.yourListings');
    Route::put('user/deactivate-car-post/{id}', [UserController::class, 'deactivateCarPost'])->name('user.deactivateCarPost');
    Route::put('user/activate-car-post/{id}', [UserController::class, 'activateCarPost'])->name('user.activateCarPost');
    Route::put('user/car-posts/{id}', [UserController::class, 'update'])->name('user.updateCarPost');


    // Profile Management Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// // Profile Management Routes
// Route::middleware(['auth'])->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::get('/manage-users', [AdminController::class, 'manageUsers'])->name('manageUsers');
    Route::get('/manage-listings', [AdminController::class, 'manageListings'])->name('manageListings');
    Route::put('/users/{id}/ban', [AdminController::class, 'banUser'])->name('banUser');
    Route::put('/users/{id}/unban', [AdminController::class, 'unbanUser'])->name('unbanUser');

    Route::put('/deactivate-car-post/{id}', [AdminController::class, 'deactivateCarPost'])->name('deactivateCarPost');
    Route::put('/activate-car-post/{id}', [AdminController::class, 'activateCarPost'])->name('activateCarPost');

    // Route::get('/car-posts/{id}/edit', [AdminController::class, 'edit'])->name('editCarPost');
    // Route::put('/car-posts/{id}', [AdminController::class, 'update'])->name('updateCarPost');

    Route::put('/car-posts/{id}', [AdminController::class, 'update'])->name('updateCarPost');


    Route::get('/users/{id}/edit', [AdminController::class, 'getUserData'])->name('getUserData');
    Route::put('/users/{id}/edit', [AdminController::class, 'updateUser'])->name('updateUser');
});

require __DIR__ . '/auth.php';
