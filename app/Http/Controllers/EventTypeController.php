<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Venue;
use App\EventType;

class EventTypeController extends Controller
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
        $eventType = EventType::where('slug', $slug)->firstOrFail();


        $venues = Venue::with('event_types')
        ->whereHas('event_types', function($q) use ($slug){
            $q->where('event_types.slug', $slug);
        })
        ->latest()
        ->paginate(9);


        return view('event_type', compact('venues', 'eventType'));
    }
}
