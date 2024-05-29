<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Room;

class RoomSeeder extends Seeder
{
    public function run()
    {
        Room::create(['type' => 'Standar', 'price' => 100000, 'image' => 'img/standar.jpg']);
        Room::create(['type' => 'Deluxe', 'price' => 500000, 'image' => 'img/deluxe.jpg']);
        Room::create(['type' => 'Family', 'price' => 1000000, 'image' => 'img/family.jpg']);
    }
}
