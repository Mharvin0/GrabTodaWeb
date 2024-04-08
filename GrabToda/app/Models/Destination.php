<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;
    protected $table = 'destination';
    protected $fillable = ['location'];

    public function index(){
        $locations = 'seededData';
        return $locations;
    }
    public function fields()
    {
        $bookings = Booking::all();

        $formattedBookings = [];

        foreach ($bookings as $booking) {
            $pickupLocationId = $booking->pickup_location;
            $dropoffLocationId = $booking->dropoff_location;

            $pickupLocationName = Destination::find($pickupLocationId)->location;
            $dropoffLocationName = Destination::find($dropoffLocationId)->location;

            $formattedBooking = [
                'User ID' => $booking->user_id,
                'Pickup Location' => $pickupLocationName,
                'Dropoff Location' => $dropoffLocationName,
            ];

            $formattedBookings[] = $formattedBooking;
        }

        return $formattedBookings;
    }
    public function bookings()
    {
        return $this->hasMany(Booking::class, 'pickup_location', 'id');
    }
    public function pickupBookings()
    {
        return $this->hasMany(Booking::class, 'pickup_location', 'id');
    }
    public function dropoffBookings()
    {
        return $this->hasMany(Booking::class, 'dropoff_location', 'id');
    }
}
