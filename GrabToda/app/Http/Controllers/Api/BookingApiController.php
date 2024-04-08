<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Booking;
use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookingApiController extends Controller
{
   public function createBooking(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pickup' => 'required',
            'dropoff' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 400);
        }

        try {
            $user = $request->user();

            $booking = Booking::create([
                'user_id' => $user->id,
                'pickup_location' => $request->input('pickup'),
                'dropoff_location' => $request->input('dropoff')
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Booking created successfully',
                'booking_id' => $booking->id,
                'booking' => $booking
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Booking creation failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }
     public function getTotalBookings()
    {
        $totalBookings = Booking::count();
        return response()->json(['totalBookings' => $totalBookings]);
    }
    public function getRecentBookings()
    {
         try {
            $recentBookings = Booking::with('user')
                ->orderBy('created_at', 'desc')
                ->take(10)
                ->get(['user_id', 'pickup_location', 'dropoff_location', 'created_at']);

            $recentBookings->transform(function ($booking) {
                $pickupLocation = Destination::find($booking->pickup_location);
                $dropoffLocation = Destination::find($booking->dropoff_location);

                $booking->pickup_location = $pickupLocation ? $pickupLocation->location : 'Unknown Location';
                $booking->dropoff_location = $dropoffLocation ? $dropoffLocation->location : 'Unknown Location';

            unset($booking->pickup_location, $booking->dropoff_location);
            return $booking;
        });

            return response()->json(['recentBookings' => $recentBookings]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch recent bookings',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
