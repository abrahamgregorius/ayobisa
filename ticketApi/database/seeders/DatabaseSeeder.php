<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Location;
use App\Models\Order;
use App\Models\Schedule;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Location::insert([
            ['name' => 'Jakarta'],
            ['name' => 'Bandung'],
            ['name' => 'Semarang'],
        ]);

        Schedule::insert([
            [
                'available_seats' => 50,
                'departure_location_id' => 1,
                'arrival_location_id' => 2,
                'price' => 100000,
                'departure_time' => Date::now()
            ],
            [
                'available_seats' => 25,
                'departure_location_id' => 2,
                'arrival_location_id' => 1,
                'price' => 100000,
                'departure_time' => Date::now()
            ],
            [
                'available_seats' => 15,
                'departure_location_id' => 1,
                'arrival_location_id' => 3,
                'price' => 100000,
                'departure_time' => Date::now()
            ],
            [
                'available_seats' => 49,
                'departure_location_id' => 3,
                'arrival_location_id' => 1,
                'price' => 100000,
                'departure_time' => Date::now()
            ],
            [
                'available_seats' => 12,
                'departure_location_id' => 2,
                'arrival_location_id' => 3,
                'price' => 100000,
                'departure_time' => Date::now()
            ],
            [
                'available_seats' => 32,
                'departure_location_id' => 3,
                'arrival_location_id' => 2,
                'price' => 100000,
                'departure_time' => Date::now()
            ],
        ]);

        Order::insert([
            [
                'penumpang_name' => 'Rafael',
                'pemesan_name' => 'Rafael',
                'phone_number' => "08123456789",
                'schedule_id' => 1
            ],
            [
                'penumpang_name' => 'Ikhsan',
                'pemesan_name' => 'Ikhsan',
                'phone_number' => "08123456789",
                'schedule_id' => 2
            ],
            [
                'penumpang_name' => 'Raya',
                'pemesan_name' => 'Rafael',
                'phone_number' => "08123456789",
                'schedule_id' => 3
            ],
        ]);
    }
}
