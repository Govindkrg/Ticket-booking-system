# Laravel Ticket Booking System

A simple ticket booking system with user authentication, event listing, AJAX booking, and booking history.

## Features

- User registration and login
- Event listing with available seats
- AJAX ticket booking without page reload
- Booking history with pagination
- Secure authentication and database operations

## Technology Stack

- Laravel 10.x
- MySQL 8.x
- Bootstrap 5.x
- Vanilla JavaScript with Fetch API

## Installation

### Prerequisites

- PHP 8.1+
- Composer
- MySQL 8+
- Node.js (for frontend assets)

### Setup Steps

1. Clone the repository:
   ```bash
   git clone https://github.com/yourusername/ticket-booking-system.git
   cd ticket-booking-system
   ```

2. Install PHP dependencies:
   ```bash
   composer install
   ```

3. Install frontend dependencies:
   ```bash
   npm install
   npm run build
   ```

4. Create and configure `.env` file:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. Edit `.env` with your database credentials:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=ticket_booking
   DB_USERNAME=your_db_username
   DB_PASSWORD=your_db_password
   ```

6. Import database schema:
   ```bash
   mysql -u your_db_username -p ticket_booking < database/schema.sql
   mysql -u your_db_username -p ticket_booking < database/seeds/events_data.sql
   ```

   Or run migrations and seeders:
   ```bash
   php artisan migrate --seed
   ```

7. Start the development server:
   ```bash
   php artisan serve
   ```

8. Access the application at:
   ```
   http://localhost:8000
   ```

## Testing Credentials

You can register a new user or use these test credentials:
- email: test@gmail.com
- Password: 12345678

## Project Structure

```
ticket-booking-system/
├── app/                  # Laravel application core
│   ├── Http/             # Controllers and middleware
│   ├── Models/           # Database models
├── config/               # Configuration files
├── database/             
│   ├── migrations/       # Database migrations
│   ├── seeders/          # Data seeders
├── public/               # Publicly accessible files
├── resources/
│   ├── js/               # JavaScript files
│   ├── views/            # Blade templates
├── routes/               # Application routes
├── tests/                # Test cases
```

## API Endpoints

- `POST /bookings` - Book a ticket (requires authentication)
  - Parameters: `event_id`
  - Returns: JSON response with success status
