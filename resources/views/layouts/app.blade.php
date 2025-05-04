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
    <nav class="navbar" style="background-color: #343a40; color: white; padding: 10px;">
        <div class="container" style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap;">
            <div style="display: flex; align-items: center;">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" style="width: 100px; height: 65px; margin-right: 10px;">
                <a href="{{ route('events.index') }}" style="color: white; font-weight: bold; text-decoration: none;">Ticket Booking System</a>
            </div>

            <!-- Hamburger button -->
            <button onclick="toggleMenu()" style="background: none; border: none; color: white; font-size: 24px; display: none;" id="hamburger">
                &#9776;
            </button>

            <!-- Nav links -->
            <div id="navMenu" style="display: flex; flex-direction: row; gap: 15px; flex-wrap: wrap;">
                @auth
                    <span style="color: white;">Welcome, {{ Auth::user()->name }}</span>
                    <a href="{{ route('events.index') }}" style="color: white; text-decoration: none;">Events</a>
                    <a href="{{ route('bookings.index') }}" style="color: white; text-decoration: none;">My Bookings</a>
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" style="background: none; border: none; color: white; text-decoration: underline; cursor: pointer;">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" style="color: white; text-decoration: none;">Login</a>
                    <a href="{{ route('register') }}" style="color: white; text-decoration: none;">Register</a>
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
      <script>
        function toggleMenu() {
            const menu = document.getElementById("navMenu");
            if (menu.style.display === "flex") {
                menu.style.display = "none";
            } else {
                menu.style.display = "flex";
                menu.style.flexDirection = "column";
                menu.style.gap = "10px";
                menu.style.marginTop = "10px";
            }
        }


        function checkWidth() {
            const w = window.innerWidth;
            const menu = document.getElementById("navMenu");
            const hamburger = document.getElementById("hamburger");

            if (w <= 768) {
                hamburger.style.display = "block";
                menu.style.display = "none";
            } else {
                hamburger.style.display = "none";
                menu.style.display = "flex";
                menu.style.flexDirection = "row";
            }
        }

        window.addEventListener("resize", checkWidth);
        window.addEventListener("load", checkWidth);
    </script>
</body>
</html>
