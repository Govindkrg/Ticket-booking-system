<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::where('available_seats', '>', 0)
                      ->get();

        return view('events.index', compact('events'));
    }
}
