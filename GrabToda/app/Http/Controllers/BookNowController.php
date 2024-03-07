<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\LocationController;
use App\Models\Destination;
use Illuminate\Http\Request;

class BookNowController extends Controller
{
    public function booking(Request $request){
        $seededData = Destination::all();
        return view('home.booking', compact('seededData'));
    }
}
