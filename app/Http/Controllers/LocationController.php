<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Venue;
use App\Location;

class LocationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       //  $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($slug)
    {
        $location = Location::where('slug', $slug)->firstOrFail();


        $venues = Venue::with('event_types')
        ->where('location_id', $location->id)
        ->latest()
        ->paginate(9);


        return view('location', compact('venues', 'location'));
    }
}
