<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CarListingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Public Routes
Route::get('/', [CarListingController::class, 'showHomepage'])->name('home');
Route::get('/car-listing', [CarListingController::class, 'index'])->name('car.listing');
Route::get('/car-detail/{id}', [CarListingController::class, 'show'])->name('car.detail');
Route::get('/about-us', function () {
    return view('aboutus');
})->name('about.us');
Route::get('/contact-us', function () {
    return view('contactus');
})->name('contact.us');
Route::post('/contact-submit', [ContactController::class, 'submit'])->name('contact.submit');

// Authenticated User Routes
Route::middleware(['auth'])->group(function () {
    Route::post('/car/{id}/place-bid', [CarListingController::class, 'placeBid'])->name('place.bid');
    Route::post('/car/{id}/request-appointment', [CarListingController::class, 'requestAppointment'])->name('request.appointment');
});

// User Dashboard Routes
Route::middleware(['auth', 'auth-user'])->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return Auth::user()->is_admin ?
            redirect()->route('admin.dashboard') :
            redirect()->route('user.dashboard');
    })->name('dashboard');

    Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard');

    // Car Management
    Route::prefix('user')->name('user.')->group(function () {
        // Car Posts
        Route::get('/sell-cars', [UserController::class, 'create'])->name('create');
        Route::post('/sell-cars', [UserController::class, 'store'])->name('store');
        Route::get('/your-listings', [UserController::class, 'yourListings'])->name('yourListings');
        Route::get('/car-posts/{id}', [UserController::class, 'getCarDetails'])->name('getCarDetails');
        Route::put('/car-posts/{id}', [UserController::class, 'update'])->name('updateCarPost');
        Route::put('/deactivate-car-post/{id}', [UserController::class, 'deactivateCarPost'])->name('deactivateCarPost');
        Route::put('/activate-car-post/{id}', [UserController::class, 'activateCarPost'])->name('activateCarPost');

        // Bids & Appointments
        Route::get('/your-bids', [UserController::class, 'yourBids'])->name('yourBids');
        Route::get('/your-appointments', [UserController::class, 'yourAppointments'])->name('yourAppointments');
        Route::put('/bid/{id}/status', [UserController::class, 'handleBid'])->name('handleBid');
        Route::put('/appointment/{id}/status', [UserController::class, 'handleAppointment'])->name('handleAppointment');
        Route::delete('/bids/{bid}', [UserController::class, 'deleteBid'])->name('deleteBid');
        Route::delete('/appointments/{appointment}', [UserController::class, 'deleteAppointment'])->name('deleteAppointment');

        // Notifications
        Route::delete('/notifications/dismiss/{id}', [UserController::class, 'dismissNotification'])->name('notifications.dismiss');
    });

    // Profile Management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/manage-users', [AdminController::class, 'manageUsers'])->name('manageUsers');
    Route::get('/manage-listings', [AdminController::class, 'manageListings'])->name('manageListings');

    // User Management
    Route::get('/users/{id}/edit', [AdminController::class, 'getUserData'])->name('getUserData');
    Route::put('/users/{id}/edit', [AdminController::class, 'updateUser'])->name('updateUser');
    Route::put('/users/{id}/ban', [AdminController::class, 'banUser'])->name('banUser');
    Route::put('/users/{id}/unban', [AdminController::class, 'unBanUser'])->name('unBanUser');
    Route::put('/users/{id}/promote', [AdminController::class, 'promoteUser'])->name('promoteUser');
    // Car Post Management
    Route::put('/car-posts/{id}', [AdminController::class, 'update'])->name('updateCarPost');
    Route::put('/deactivate-car-post/{id}', [AdminController::class, 'deactivateCarPost'])->name('deactivateCarPost');
    Route::put('/activate-car-post/{id}', [AdminController::class, 'activateCarPost'])->name('activateCarPost');
});

require __DIR__ . '/auth.php';
