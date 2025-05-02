<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Booking System - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    @stack('styles')
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('events.index') }}">Ticket Booking System</a>
            <div class="navbar-nav">
                @auth
                    <span class="nav-item nav-link">Welcome, {{ Auth::user()->name }}</span>
                    <a class="nav-item nav-link" href="{{ route('events.index') }}">Events</a>
                    <a class="nav-item nav-link" href="{{ route('bookings.index') }}">My Bookings</a>
                    <form action="{{ route('logout') }}" method="POST" class="nav-item">
                        @csrf
                        <button type="submit" class="nav-link btn btn-link">Logout</button>
                    </form>
                @else
                    <a class="nav-item nav-link" href="{{ route('login') }}">Login</a>
                    <a class="nav-item nav-link" href="{{ route('register') }}">Register</a>
                @endauth
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
    <footer style="background-color: #f0f0f0; padding: 20px 10px; text-align: center; font-family: Arial, sans-serif; margin-top: 40px; border-top: 1px solid #ddd;">
        <p style="margin: 5px 0; font-size: 16px; color: #333;">
          Developed By <strong>Govind</strong> &mdash; This is an <strong>Assignment</strong>
        </p>
        <a href="tel:9616681400" style="display: inline-block; margin-top: 10px; font-size: 18px; color: #007bff; text-decoration: none; font-weight: bold;">
          Contact Us
        </a>
      </footer>

</body>
</html>
