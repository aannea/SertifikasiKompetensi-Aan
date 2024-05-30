<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//kelas untuk model booking untuk pertukaran data 
class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'gender', 'identity_number', 'room_id',
        'booking_date', 'duration', 'breakfast', 'discount', 'total_price'
    ];

    //fungsi untuk relasi tabel
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
