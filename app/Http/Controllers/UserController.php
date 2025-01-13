<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CarPost;

class UserController extends Controller
{
    // public function sellCar()
    // {
    //     return view('sell-car');
    // }
    public function index()
    {
        return view('user.dashboard');
    }

    // Sell Car page
    public function create()
    {
        return view('user.sell-cars');
    }

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
        return redirect()->route('user.create')->with('success', 'Car posted successfully!');
    }



    // Your Listings page
    public function yourListings()
    {
        // Fetch car posts of the logged-in user
        $user = Auth::user();
        $carPosts = CarPost::where('user_id', $user->id)->get();

        // Pass data to the view
        return view('user.your-listings', compact('carPosts'));
    }
    public function deactivateCarPost($id)
    {
        $post = CarPost::findOrFail($id);
        $post->update(['status' => 'unavailable']); // Update status to inactive
        return redirect()->back()->with('success', 'Car post deactivated successfully.');
    }
    public function activateCarPost($id)
    {
        $post = CarPost::findOrFail($id);
        $post->update(['status' => 'available']); // Update status to active
        return redirect()->back()->with('success', 'Car post activated successfully.');
    }
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'condition' => 'required|string|in:New,Used',
                'make' => 'required|string|max:255',
                'model' => 'required|string|max:255',
                'registration_year' => 'required|integer|min:1900|max:' . date('Y'),
                'price' => 'required|numeric|min:0',
                'engine_power' => 'required|string|max:255',
                'steering_position' => 'required|string|in:Left,Right',
                'transmission' => 'required|string|in:Automatic,Manual',
                'fuel_type' => 'required|string|in:Petrol,Diesel,Electric,Hybrid',
                'color' => 'required|string|max:255',
                'description' => 'required|string',
                'status' => 'required|string|in:available,unavailable',
            ],
            [],
            [],
            function ($validator) {
                return response()->json(['success' => false, 'errors' => $validator->errors()]);
            }
        );
        $post = CarPost::find($request->id);

        $post->update([
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
            'status' => $request->status,
            'img_path' => $request->file('img_path')
                ? $request->file('img_path')->store('uploads', 'public')
                : $post->img_path,
        ]);

        if ($post->save()) {
            return response()->json(['success' => true, 'message' => 'Car post updated successfully!']);
        } else {
            return response()->json(['success' => false, 'message' => 'Failed to update car post.']);
        }
    }
}
