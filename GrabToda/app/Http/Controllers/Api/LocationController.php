<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DestinationResource;
use App\Models\Destination;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function getTotalLocations()
    {
        $seededData = Destination::count();
        return response()->json(['totalLocations' => $seededData]);
    }
    public function index(){
        $locations = Destination::all();
        return DestinationResource::collection($locations);
    }
    public function show($id)
    {
        $location = Destination::findOrFail($id);
        return new DestinationResource($location);
    }
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $location = Destination::create([
            'name' => $request->name,
        ]);

        return response()->json(new DestinationResource($location), 201);
    }
    public function update(Request $request, Destination $destination)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $destination->update($request->all());
        return new DestinationResource($destination);
    }
    public function destroy(Destination $destination)
    {
        $destination->delete();
        return response()->json(null, 204);
    }
}
