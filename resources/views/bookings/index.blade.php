@extends('layouts.app')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

@section('title', 'My Bookings')

@section('content')
    <h1 class="mb-4">My Bookings</h1>

    @if($bookings->isEmpty())
        <div class="alert alert-info">You have no bookings yet.</div>
    @else
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Event Name</th>
                        <th>Date</th>
                        <th>Venue</th>
                        <th>Booking Time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $booking)
                        <tr>
                            <td>{{ $booking->event->name }}</td>
                            <td>
                                {{ \Carbon\Carbon::parse($booking->event->date)->format('d-m-Y H:i:s') }}


                            </td>
                            <td>{{ $booking->event->venue }}</td>
                            <td>

                                {{ \Carbon\Carbon::parse($booking->event->created_at)->format('d-m-Y H:i:s') }}

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div style="display: flex; justify-content: center; margin-top: 20px;">
            {{ $bookings->links() }}
        </div>

    @endif
@endsection
