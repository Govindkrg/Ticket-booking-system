@extends('layouts.app')

@section('title', 'Events')

@section('content')
    <h1 class="mb-4">Upcoming Events</h1>

    <div id="booking-message"></div>

    <div class="row">
        @foreach($events as $event)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $event->name }}</h5>
                        <p class="card-text">
                            <strong>Date:</strong> {{ \Carbon\Carbon::parse($event->date)->format('d-m-Y H:i:s') }}
                            <br>
                            <strong>Venue:</strong> {{ $event->venue }}<br>
                            <strong>Available Seats:</strong> <span id="seats-{{ $event->id }}">{{ $event->available_seats }}</span>
                        </p>
                        @auth
                            <button class="btn btn-primary book-btn" data-event-id="{{ $event->id }}">Book Ticket</button>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary">Login to Book</a>
                        @endauth
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const bookingMessage = document.getElementById('booking-message');

            document.querySelectorAll('.book-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const eventId = this.getAttribute('data-event-id');

                    fetch('{{ route("bookings.store") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({ event_id: eventId })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            bookingMessage.innerHTML = `
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    ${data.message}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            `;

                            // Update available seats
                            const seatElement = document.getElementById(`seats-${eventId}`);
                            if (seatElement) {
                                seatElement.textContent = data.available_seats;
                            }

                            // Disable button if no seats left
                            if (data.available_seats <= 0) {
                                this.disabled = true;
                            }
                        } else {
                            bookingMessage.innerHTML = `
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    ${data.message}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            `;
                        }
                    })
                    .catch(error => {
                        bookingMessage.innerHTML = `
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                An error occurred: ${error}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        `;
                    });
                });
            });
        });
    </script>
@endpush
