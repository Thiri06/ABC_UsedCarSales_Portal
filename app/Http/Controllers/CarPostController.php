<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarPost;
use Illuminate\Support\Facades\Auth;

class CarPostController extends Controller
{
    // Show the sell car form
    public function create()
    {
        return view('sellcar'); // Ensure this matches the blade file's name
    }

    // Handle form submission
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'condition' => 'required|string',
            'make' => 'required|string',
            'model' => 'required|string',
            'registration_year' => 'required|integer|min:1900|max:' . date('Y'),
            'price' => 'required|numeric|min:0',
            'engine_power' => 'required|string',
            'steering_position' => 'required|string',
            'transmission' => 'required|string',
            'fuel_type' => 'required|string',
            'color' => 'required|string',
            'description' => 'required|string',
            'img_path' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Handle image upload
        $imagePath = $request->file('img_path')->store('car_images', 'public');

        // Save car post to the database
        CarPost::create([
            'condition' => $request->condition,
            'make' => $request->make,
            'model' => $request->model,
            'registration_year' => $request->registration_year,
            'price' => $request->price,
            'engine_power' => $request->engine_power,
            'steering_position' => $request->steering_position,
            'transmission' => $request->transmission,
            'fuel_type' => $request->fuel_type,
            'color' => $request->color,
            'description' => $request->description,
            'img_path' => $imagePath,
            'user_id' => Auth::id(),
        ]);

        // Redirect back with success message
        return redirect()->route('car.post.create')->with('success', 'Car posted successfully!');
    }
}
