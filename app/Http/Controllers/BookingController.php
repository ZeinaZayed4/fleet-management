<?php

// app/Http/Controllers/BookingController.php
namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Trip;
use App\Models\Seat;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function bookSeat(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'trip_id' => 'required|exists:trips,id',
            'seat_id' => 'required|exists:seats,id',
            'start_station_id' => 'required|exists:stations,id',
            'end_station_id' => 'required|exists:stations,id',
        ]);

        $isSeatAvailable = $this->checkSeatAvailability(
            $request->trip_id,
            $request->seat_id,
            $request->start_station_id,
            $request->end_station_id
        );

        if (!$isSeatAvailable) {
            return response()->json(['message' => 'Seat is not available for the selected trip.'], 400);
        }

        $booking = Booking::create([
            'user_id' => $request->user_id,
            'trip_id' => $request->trip_id,
            'seat_id' => $request->seat_id,
            'start_station_id' => $request->start_station_id,
            'end_station_id' => $request->end_station_id,
        ]);

        return response()->json(['message' => 'Booking successful!', 'booking' => $booking], 201);
    }

    public function getAvailableSeats(Request $request)
    {
        $request->validate([
            'trip_id' => 'required|exists:trips,id',
            'start_station_id' => 'required|exists:stations,id',
            'end_station_id' => 'required|exists:stations,id',
        ]);

        $trip = Trip::find($request->trip_id);
        $bookedSeats = Booking::where('trip_id', $request->trip_id)
            ->where(function ($query) use ($request) {
                $query->whereBetween('start_station_id', [$request->start_station_id, $request->end_station_id])
                    ->orWhereBetween('end_station_id', [$request->start_station_id, $request->end_station_id]);
            })
            ->pluck('seat_id');

        $availableSeats = $trip->bus->seats()->whereNotIn('id', $bookedSeats)->get();

        return response()->json(['available_seats' => $availableSeats]);
    }

    private function checkSeatAvailability($tripId, $seatId, $startStationId, $endStationId)
    {
        $bookings = Booking::where('trip_id', $tripId)
            ->where('seat_id', $seatId)
            ->get();

        foreach ($bookings as $booking) {
            if (
                ($startStationId >= $booking->start_station_id && $startStationId < $booking->end_station_id) ||
                ($endStationId > $booking->start_station_id && $endStationId <= $booking->end_station_id) ||
                ($startStationId < $booking->start_station_id && $endStationId > $booking->end_station_id)
            ) {
                return false;
            }
        }

        return true;
    }
}
