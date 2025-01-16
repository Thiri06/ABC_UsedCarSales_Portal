<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CarPost;
use App\Models\Appointment;
use App\Models\Bid;
use App\Notifications\BidStatusNotification;
use App\Notifications\AppointmentStatusNotification;
use App\Models\Notification;

class UserController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $notifications = $user->notifications; // Get all notifications for the user
        return view('user.dashboard', compact('notifications'));
    }
    public function clearNotifications()
    {
        Auth::user()->notifications->each->delete();
        return back()->with('success', 'Notifications cleared.');
    }
    // Fetch Bids for the Car Owner
    public function yourBids()
    {
        $user = Auth::user();
        // Fetch the car posts owned by the user
        $userCarIds = $user->carPosts->pluck('id');

        // Fetch bids for the user's car posts
        $bids = Bid::whereIn('car_id', $userCarIds)
            ->with(['user', 'carPost'])
            ->latest()
            ->get();
        // Fetch notifications for the user
        $notifications = $user->notifications;
        return view('user.your-bids', compact('bids', 'notifications'));
    }
    // Fetch Appointments for the Car Owner
    public function yourAppointments()
    {
        $user = Auth::user();

        // Fetch the car posts owned by the user
        $userCarIds = $user->carPosts->pluck('id');

        // Fetch appointments for the user's car posts
        $appointments = Appointment::whereIn('car_id', $userCarIds)
            ->with(['user', 'carPost'])
            ->latest()
            ->get();

        // Fetch notifications for the user
        $notifications = $user->notifications;
        return view('user.your-appointments', compact('appointments', 'notifications'));
    }

    public function dismissNotification($notificationId)
    {
        $notification = Auth::user()->notifications->where('id', $notificationId)->first();
        if (!$notification) {
            return response()->json(['error' => 'Notification not found'], 404);
        }
        $notification->delete();
        return response()->json(['success' => true]);
    }

    // Accept or Reject Bid
    public function handleBid(Request $request, $bidId)
    {
        $request->validate(['status' => 'required|in:accepted,rejected']);
        $bid = Bid::findOrFail($bidId);
        // Only allow the car owner to modify the bid
        if ($bid->carPost->user_id !== Auth::id()) {
            return back()->withErrors(['error' => 'Unauthorized action.']);
        }
        $bid->update(['status' => $request->status]);
        // Notify the bidder about the status
        $bid->user->notify(new BidStatusNotification($bid, $request->status));
        // If the bid is accepted, mark the car as unavailable
        if ($request->status === 'accepted') {
            $bid->carPost->update(['status' => 'unavailable']);
            return back()->with('success', 'The car was sold out successfully!');
        }
        // If the bid is rejected, send a different success message
        return back()->with('success', 'The bid has been rejected successfully.');
    }
    // Accept or Reject Appointment
    public function handleAppointment(Request $request, $appointmentId)
    {
        $request->validate(['status' => 'required|in:accepted,rejected']);
        $appointment = Appointment::findOrFail($appointmentId);
        // Only allow the car owner to modify the appointment
        if ($appointment->carPost->user_id !== Auth::id()) {
            return back()->withErrors(['error' => 'Unauthorized action.']);
        }
        $appointment->update(['status' => $request->status]);
        // Notify the appointment requester about the status
        $appointment->user->notify(new AppointmentStatusNotification($appointment, $request->status));
        return back()->with('success', 'You have accepted the appointment for test drive!');
    }
    // Delete a Bid
    public function deleteBid($id)
    {
        $bid = Bid::findOrFail($id);
        // Optional: Add authorization logic if needed
        $bid->delete();
        return back()->with('success', 'Bid deleted successfully!');
    }

    // Delete an Appointment
    public function deleteAppointment($id)
    {
        $appointment = Appointment::findOrFail($id);
        // Optional: Add authorization logic if needed
        $appointment->delete();
        return back()->with('success', 'Appointment deleted successfully!');
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

        // dd($carPosts);

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
    public function getCarDetails($id)
    {
        $car = CarPost::findOrFail($id);

        return response()->json([
            'success' => true,
            'car' => [
                'img_path' => asset('storage/' . $car->img_path),
                'condition' => $car->condition,
                'make' => $car->make,
                'model' => $car->model,
                'registration_year' => $car->registration_year,
                'price' => $car->price,
                'engine_power' => $car->engine_power,
                'steering_position' => $car->steering_position,
                'transmission' => $car->transmission,
                'fuel_type' => $car->fuel_type,
                'color' => $car->color,
                'description' => $car->description,
                'status' => $car->status
            ]
        ]);
    }
}
