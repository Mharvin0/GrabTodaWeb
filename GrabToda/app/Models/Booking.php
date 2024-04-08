<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'pickup_location', 'dropoff_location'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function pickupLocation()
    {
        return $this->belongsTo(Destination::class, 'pickup_location_id');
    }

    public function dropoffLocation()
    {
        return $this->belongsTo(Destination::class, 'dropoff_location_id');
    }
}
