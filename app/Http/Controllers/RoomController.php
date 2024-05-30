<?php

namespace App\Http\Controllers;

use App\Models\Room;

//class untuk kontroler kamar, yang di gunakan untuk menampilkan halaman
class RoomController extends Controller
{
    //memanggil halaman home
    public function home()
    {
        return view('home');
    }

    //memanggil halaman room/kamar
    public function showRooms()
    {
        $rooms = Room::all();
        return view('rooms', compact('rooms'));
    }

    //memanggil halaman prices atau harga
    public function showPrices()
    {
        $rooms = Room::all();
        return view('prices', compact('rooms'));
    }

    //memanggil halaman about atau tentang kami
    public function about()
    {
        return view('about');
    }
}
