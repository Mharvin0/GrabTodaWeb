<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DestinationResource;
use App\Models\Destination;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index(){
        $seededData = Destination::all();
        return response()->json($seededData);
    }
    public function update(Request $request, Destination $seededData){
        $seededData ->update($request->all());
        return new DestinationResource($seededData);
    }
    public function destroy(Destination $seededData){
        $seededData ->delete();
        return response(null, 201);
    }
}
