<?php

namespace Tests\Feature;

use App\Models\Booking;
use App\Models\Seat;
use App\Models\Trip;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookingTest extends TestCase
{
    use RefreshDatabase;

    public function test_seat_booking()
    {
        // Create a user
        $user = User::factory()->create();

        // Create a trip with a bus and stations
        $trip = Trip::factory()->create();

        // Create a seat for the bus
        $seat = Seat::factory()->create(['bus_id' => $trip->bus_id]);

        // Attempt to book the seat
        $response = $this->postJson('/api/book-seat', [
            'user_id' => $user->id,
            'trip_id' => $trip->id,
            'seat_id' => $seat->id,
            'start_station_id' => $trip->start_station_id,
            'end_station_id' => $trip->end_station_id,
        ]);
        // Assert the response
        $response->assertStatus(201)
            ->assertJson(['message' => 'Booking successful!']);

        // Assert the booking was created
        $this->assertDatabaseHas('bookings', [
            'user_id' => $user->id,
            'trip_id' => $trip->id,
            'seat_id' => $seat->id,
            'start_station_id' => $trip->start_station_id,
            'end_station_id' => $trip->end_station_id,
        ]);
    }
}
