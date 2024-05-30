<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Room;

//kelas untuk menginput data kedalam database room
class RoomSeeder extends Seeder
{
    //fungsi untuk menginput datanya kedalam tabel
    public function run()
    {
        Room::create(['type' => 'Standar', 'price' => 100000, 'image' => 'img/standar.jpg']);
        Room::create(['type' => 'Deluxe', 'price' => 500000, 'image' => 'img/deluxe.jpg']);
        Room::create(['type' => 'Family', 'price' => 1000000, 'image' => 'img/family.jpg']);
    }
}
