<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarPost;
use App\Models\Bid;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;


class CarListingController extends Controller
{
    public function index(Request $request)
    {
        // Fetch car posts with optional search and filter parameters
        $query = CarPost::query();

        // Fetch distinct values for dropdowns
        $makes = CarPost::distinct()->pluck('make');
        $models = CarPost::distinct()->pluck('model');
        $colors = CarPost::distinct()->pluck('color');

        // Filter posts to only include those with "available" status
        $query->where('status', 'available');

        $query->whereHas('user', function ($q) {
            $q->where('banned_at', null);  // assuming 'is_banned' is a boolean column in the users table
        });

        // Apply filters only when they are provided and valid
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('make', 'like', '%' . $request->search . '%')
                    ->orWhere('model', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('condition') && $request->condition !== 'all') {
            $query->where('condition', $request->condition);
        }

        if ($request->filled('make')) {
            $query->where('make', $request->make);
        }

        if ($request->filled('model')) {
            $query->where('model', $request->model);
        }

        if ($request->filled('price_min')) {
            $query->where('price', '>=', $request->price_min);
        }

        if ($request->filled('price_max')) {
            $query->where('price', '<=', $request->price_max);
        }

        if ($request->filled('registration_year_min') || $request->filled('registration_year_max')) {
            if ($request->filled('registration_year_min')) {
                $query->where('registration_year', '>=', $request->registration_year_min);
            }

            if ($request->filled('registration_year_max')) {
                $query->where('registration_year', '<=', $request->registration_year_max);
            }
        }

        if ($request->filled('transmission')) {
            $query->where('transmission', $request->transmission);
        }

        if ($request->filled('fuel_type')) {
            $query->where('fuel_type', $request->fuel_type);
        }

        if ($request->filled('color')) {
            $query->where('color', $request->color);
        }

        // **Order posts by ID in descending order**
        $query->orderBy('updated_at', 'desc')->orderBy('id', 'desc');

        // Paginate the results
        $carPosts = $query->paginate(8);

        // Return view with car posts
        return view('carlisting', compact('carPosts', 'makes', 'models', 'colors'));
    }
    // CarListingController.php
    public function showHomepage()
    {
        // Fetch the 4 cheapest cars, ordered by price
        $topCars = CarPost::with('user')->orderBy('price', 'asc')->take(4)->get();

        // Passing the data to the welcome view
        return view('welcome', compact('topCars')); // Ensure you're passing topCars here
    }



    // Car Detail
    public function show($id)
    {
        // Fetch the car post by ID
        $car = CarPost::with('bids.user')->findOrFail($id); // Throws 404 if the car is not found

        $bids = $car->bids;

        // Pass the car details to the view
        return view('cardetail', compact('car', 'bids'));
    }

    public function placeBid(Request $request, $carId)
    {
        $request->validate([
            'bid_amount' => 'required|numeric|min:0',
        ]);

        $car = CarPost::findOrFail($carId);

        if ($request->bid_amount <= $car->highest_bid) {
            return back()->withErrors(['bid_amount' => 'Your bid must be higher than the current highest bid.']);
        }

        Bid::create([
            'car_id' => $carId,
            'user_id' => Auth::id(),
            'bid_amount' => $request->bid_amount,
            'status' => 'pending',
        ]);

        $car->update(['highest_bid' => $request->bid_amount]);

        return back()->with('success', 'Bid placed successfully!');
    }

    public function requestAppointment(Request $request, $carId)
    {
        $request->validate([
            'appointment_date' => 'required|date|after_or_equal:today',
            'appointment_time' => 'required',
        ]);

        $car = CarPost::findOrFail($carId);

        if (
            in_array($request->appointment_date, $car->unavailable_dates ?? []) ||
            in_array($request->appointment_time, $car->unavailable_times ?? [])
        ) {
            return back()->withErrors(['appointment_date' => 'The selected date and time are unavailable.']);
        }

        // Check for existing appointments
        $existingAppointment = Appointment::where('car_id', $carId)
            ->where('appointment_date', $request->appointment_date)
            ->where('appointment_time', $request->appointment_time)
            ->where('status', '!=', 'rejected')
            ->first();

        if ($existingAppointment) {
            return back()->withErrors([
                'appointment_conflict' => 'This time slot is already booked. Please select a different time.'
            ]);
        }

        Appointment::create([
            'car_id' => $carId,
            'user_id' => Auth::id(),
            'appointment_date' => $request->appointment_date,
            'appointment_time' => $request->appointment_time,
            'status' => 'pending',
        ]);

        return back()->with('success', 'Appointment requested successfully!');
    }
}
