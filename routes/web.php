<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\BookingController;

Route::get('/', [RoomController::class, 'home']);
Route::get('/rooms', [RoomController::class, 'showRooms']);
Route::get('/prices', [RoomController::class, 'showPrices']);
Route::get('/about', [RoomController::class, 'about']);
Route::get('/book', [BookingController::class, 'create']);
Route::post('/book', [BookingController::class, 'store'])->name('createMantap');
Route::get('/stats', [BookingController::class, 'showStats']);
Route::get('/booking', [BookingController::class, 'showBookings']);
Route::delete('/booking/delete-all', [BookingController::class, 'deleteAllBookings'])->name('bookings.deleteAll');
