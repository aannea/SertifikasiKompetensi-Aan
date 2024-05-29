<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'gender', 'identity_number', 'room_id',
        'booking_date', 'duration', 'breakfast', 'discount', 'total_price'
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
