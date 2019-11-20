<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EventType;
use App\Location;
use App\Venue;

class HomeController extends Controller
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
    public function index()
    {


        $featuredVenues = Venue::where('is_featured', 1)->get();

        $eventTypes = EventType::all();
        $locations = Location::all();

        $newestVenues = Venue::with('event_types')->latest()->take(3)->get();


        return view('home', compact('featuredVenues', 'eventTypes', 'locations', 'newestVenues'));
    }
}
