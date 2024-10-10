<?php

namespace App\Http\Controllers;

use App\Models\BrgyInhabitant;
use App\Models\Event;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch demographic statistics
        $totalPopulation = BrgyInhabitant::count();
        $maleCount = BrgyInhabitant::where('sex', 'Male')->count();
        $femaleCount = BrgyInhabitant::where('sex', 'Female')->count();

        $ageGroups = [
            '0-17' => BrgyInhabitant::whereBetween('age', [0, 17])->count(),
            '18-35' => BrgyInhabitant::whereBetween('age', [18, 35])->count(),
            '36-60' => BrgyInhabitant::whereBetween('age', [36, 60])->count(),
            '60+' => BrgyInhabitant::where('age', '>', 60)->count(),
        ];

        // Fetch site settings
        $siteSetting = SiteSetting::first();

        // Pass data to the view
        return view('welcome', [
            'siteSetting' => $siteSetting,
            'totalPopulation' => $totalPopulation,
            'maleCount' => $maleCount,
            'femaleCount' => $femaleCount,
            'ageGroups' => $ageGroups,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        $event = Event::findOrFail($id);

        return view('events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }
}
