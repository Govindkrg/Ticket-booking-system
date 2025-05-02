<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class BookingController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'event_id' => 'required|exists:events,id',
        ]);

        $event = Event::findOrFail($request->event_id);

        if ($event->available_seats <= 0) {
            return response()->json([
                'success' => false,
                'message' => 'No seats available for this event!'
            ], 400);
        }

        // Use transaction to ensure data consistency
        DB::transaction(function () use ($event) {
            Booking::create([
                'user_id' => Auth::id(),
                'event_id' => $event->id,
            ]);

            $event->decrement('available_seats');
        });

        return response()->json([
            'success' => true,
            'message' => 'Ticket booked successfully!',
            'available_seats' => $event->fresh()->available_seats
        ]);
    }

    public function index(Request $request)
    {
        $perPage = 5;
        $bookings = Auth::user()->bookings()
                       ->with('event')
                       ->latest()
                       ->paginate($perPage);

        return view('bookings.index', compact('bookings'));
    }
}
