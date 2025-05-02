<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('events')->insert([
            ['name' => 'Rock Concert', 'date' => '2023-12-15 20:00:00', 'venue' => 'Main Arena', 'available_seats' => 500],
            ['name' => 'Jazz Night', 'date' => '2023-12-20 19:30:00', 'venue' => 'City Hall', 'available_seats' => 200],
            ['name' => 'Tech Conference', 'date' => '2023-12-10 09:00:00', 'venue' => 'Convention Center', 'available_seats' => 300],
        ]);
    }
}
