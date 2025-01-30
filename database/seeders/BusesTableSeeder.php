<?php

namespace Database\Seeders;

use App\Models\Bus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bus::create(['name' => 'Bus 1', 'total_seats' => 12]);
        Bus::create(['name' => 'Bus 2', 'total_seats' => 12]);
    }
}
