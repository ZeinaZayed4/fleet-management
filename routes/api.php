<?php

use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;

Route::post('/book-seat', [BookingController::class, 'bookSeat']);
Route::get('/available-seats', [BookingController::class, 'getAvailableSeats']);
