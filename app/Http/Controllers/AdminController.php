<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use App\Models\User;
use App\Models\CarPost;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller implements HasMiddleware
{


    // Manage users
    public static function middleware(): array
    {
        return ['auth', 'admin'];
    }
    public function manageUsers()
    {
        $users = \App\Models\User::select('id', 'name', 'email', 'phone', 'address', 'is_admin', 'banned_at')
            ->get();

        return view('admin.manage-users', compact('users'));
    }
    public function getUserData($id)
    {
        try {
            $user = User::findOrFail($id);
            return response()->json($user);
        } catch (\Exception $e) {
            return response()->json(['error' => 'User not found'], 404);
        }
    }
    // Update user data in the database
    public function updateUser(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
        ]);
        $user = User::findOrFail($id);
        $user->update($validated);
        // Return a success message
        return redirect()->back()->with('success', 'User details updated successfully.');
    }
    public function banUser($id)
    {
        $user = User::findOrFail($id);
        $user->update(['banned_at' => now()]); // Set current timestamp to ban the user
        return redirect()->back()->with('success', 'User account has been deactivated successfully.');
    }
    public function unBanUser($id)
    {
        $user = User::findOrFail($id);
        $user->update(['banned_at' => null]); // Reset the banned_at column to unban the user
        return redirect()->back()->with('success', 'User account has been activated back successfully.');
    }

    public function promoteUser($id)
    {
        $user = User::findOrFail($id);
        $user->update(['is_admin' => true]);
        return redirect()->back()->with('success', 'User has been promoted to Admin successfully.');
    }


    // Manage car posts
    public function manageListings()
    {
        $carPosts = CarPost::all(); // Retrieve all car posts with all attributes
        return view('admin.manage-listings', compact('carPosts'));
    }
    public function deactivateCarPost($id)
    {
        $carPost = CarPost::findOrFail($id);
        $carPost->update(['status' => 'unavailable']); // Update status to inactive
        return redirect()->back()->with('success', 'Car post deactivated successfully.');
    }
    public function activateCarPost($id)
    {
        $carPost = CarPost::findOrFail($id);
        $carPost->update(['status' => 'available']); // Update status to active
        return redirect()->back()->with('success', 'Car post activated successfully.');
    }
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'condition' => 'required|string|in:Second Hand,Third Hand',
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
            ],
            [],
            [],
            function ($validator) {
                return response()->json(['success' => false, 'errors' => $validator->errors()]);
            }
        );
        $carPost = CarPost::find($request->id);

        $carPost->update([
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
            'img_path' => $request->file('img_path')
                ? $request->file('img_path')->store('uploads', 'public')
                : $carPost->img_path,
        ]);

        if ($carPost->save()) {
            return response()->json(['success' => true, 'message' => 'Car post updated successfully!']);
        } else {
            return response()->json(['success' => false, 'message' => 'Failed to update car post.']);
        }
    }

    // dashboard statistics
    public function dashboard()
    {
        $totalUsers = User::count();
        $totalCarPosts = CarPost::count();
        $activeUsers = User::whereNull('banned_at')->count();
        $availableCarPosts = CarPost::where('status', 'available')->count();

        // Data for charts
        $topCategories = CarPost::select('make', DB::raw('COUNT(*) as count'))
            ->groupBy('make')
            ->orderBy('count', 'desc')
            ->take(5)
            ->get();

        $newRegistrations = User::select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as count'))
            ->where(
                'created_at',
                '>=',
                now()->subDays(7)
            )
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        return view(
            'admin.dashboard',
            compact('totalUsers', 'totalCarPosts', 'activeUsers', 'availableCarPosts', 'topCategories', 'newRegistrations')
        );
    }
}
