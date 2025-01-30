<?php

namespace Database\Seeders;

use App\Models\Bus;
use App\Models\Seat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $buses = Bus::all();
        foreach ($buses as $bus) {
            for ($i = 1; $i <= $bus->total_seats; $i++) {
                Seat::create([
                    'bus_id' => $bus->id,
                    'seat_number' => $i,
                ]);
            }
        }
    }
}
