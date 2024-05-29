<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function showRooms()
    {
        $rooms = Room::all();
        return view('rooms', compact('rooms'));
    }

    public function showPrices()
    {
        $rooms = Room::all();
        return view('prices', compact('rooms'));
    }

    public function about()
    {
        return view('about');
    }
}
