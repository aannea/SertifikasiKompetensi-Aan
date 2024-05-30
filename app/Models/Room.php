<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//model untuk room untuk pertukaran data kamar
class Room extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'price', 'image'];

    //relasi dengan tabel booking
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
