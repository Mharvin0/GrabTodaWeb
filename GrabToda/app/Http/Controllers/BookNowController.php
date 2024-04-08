<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\LocationController;
use App\Models\Destination;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class BookNowController extends Controller
{
     public function booking(Request $request)
    {
        $seededData = Destination::all();
        return view('home.booking', compact('seededData'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'pickup' => 'required',
            'dropoff' => 'required',
        ]);

        $user = Auth::user();

        $booking = new Booking();
        $booking->user_id = $user->id;
        $booking->pickup_location = $request->pickup;
        $booking->dropoff_location = $request->dropoff;
        $booking->save();

        return redirect()->back()->with('success', 'Booking created successfully!');
    }

}
