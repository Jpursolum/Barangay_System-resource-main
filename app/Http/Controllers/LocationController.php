<?php

namespace App\Http\Controllers;

use App\Models\Location;

class LocationController extends Controller
{
    public function showMap()
    {
        $locations = Location::all();  // Fetch all locations

        return view('locations.map', compact('locations'));
    }
}
