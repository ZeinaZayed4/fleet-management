<?php

namespace Database\Seeders;

use App\Models\Station;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Station::create(['name' => 'Cairo']);
        Station::create(['name' => 'Giza']);
        Station::create(['name' => 'AlFayyum']);
        Station::create(['name' => 'AlMinya']);
        Station::create(['name' => 'Asyut']);
    }
}
