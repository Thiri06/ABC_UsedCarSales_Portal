<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarPost;

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

    public function show($id)
    {
        // Fetch the car post by ID
        $car = CarPost::findOrFail($id); // Throws 404 if the car is not found

        // Pass the car details to the view
        return view('cardetail', compact('car'));
    }

    // CarListingController.php
    public function showHomepage()
    {
        // Fetch the 4 cheapest cars, ordered by price
        $topCars = CarPost::with('user')->orderBy('price', 'asc')->take(4)->get();

        // Passing the data to the welcome view
        return view('welcome', compact('topCars')); // Ensure you're passing topCars here
    }
}
