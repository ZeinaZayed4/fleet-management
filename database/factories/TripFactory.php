<?php

namespace Database\Factories;

use App\Models\Bus;
use App\Models\Station;
use App\Models\Trip;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Trip>
 */
class TripFactory extends Factory
{
    protected $model = Trip::class;

    public function definition()
    {
        return [
            'bus_id' => Bus::factory(),
            'start_station_id' => Station::factory(),
            'end_station_id' => Station::factory(),
        ];
    }
}
