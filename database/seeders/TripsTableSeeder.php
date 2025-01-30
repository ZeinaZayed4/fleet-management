<?php

namespace Database\Seeders;

use App\Models\Trip;
use App\Models\TripStation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TripsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $trip = Trip::create([
            'bus_id' => 1,
            'start_station_id' => 1,
            'end_station_id' => 5,
        ]);

        TripStation::create(['trip_id' => $trip->id, 'station_id' => 1, 'order' => 1]);
        TripStation::create(['trip_id' => $trip->id, 'station_id' => 2, 'order' => 2]);
        TripStation::create(['trip_id' => $trip->id, 'station_id' => 3, 'order' => 3]);
        TripStation::create(['trip_id' => $trip->id, 'station_id' => 4, 'order' => 4]);
        TripStation::create(['trip_id' => $trip->id, 'station_id' => 5, 'order' => 5]);
    }
}
