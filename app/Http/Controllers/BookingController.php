<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Room;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function create()
    {
        $rooms = Room::all();
        return view('bookings', compact('rooms'));
    }

    public function store(Request $request){
        try {
            // $request->validate([
            //     'name' => 'required|string',
            //     'gender' => 'required|in:Cowo,Cewe',
            //     'identity_number' => 'required|digits:16',
            //     'room_id' => 'required|exists:rooms,id',
            //     'booking_date' => 'required|date_format:d/m/Y',
            //     'duration' => 'required|integer|min:1',
            //     'breakfast' => 'string',
            // ]);

            $room = Room::findOrFail($request->room_id);
            $duration = $request->duration;
            $breakfast = $request->has('breakfast');
            $roomPrice = $room->price;
            $totalPrice = $roomPrice * $duration;

            $discount = 0;
            if ($duration > 3) {
                $totalPrice *= 0.9;
                $discount = 10;
            }
            if ($breakfast) {
                $totalPrice += 80000 * $duration;
            }

            Booking::create([
                'name' => $request->name,
                'gender' => $request->gender,
                'identity_number' => $request->identity_number,
                'room_id' => $request->room_id,
                'booking_date' => $request->booking_date,
                'duration' => $request->duration,
                'breakfast' => $breakfast,
                'discount' => $discount,
                'total_price' => $totalPrice,
            ]);

            return redirect('/')->with('success', 'Booking berhasil dibuat!');
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['error' => 'Terjadi kesalahan saat membuat booking. Silakan coba lagi.']);
        }
    }

    public function showStats(){
        $roomTypes = Room::pluck('type');
        $bookingsCount = Room::withCount('bookings')->pluck('bookings_count');

        return view('stats', compact('roomTypes', 'bookingsCount'));
    }

    public function showBookings(){
        $bookings = Booking::with('room')->get();
        return view('booking', compact('bookings'));
    }

    public function deleteAllBookings(){
        Booking::truncate();
        return redirect()->back()->with('success', 'Semua booking berhasil dihapus.');
    }
}
