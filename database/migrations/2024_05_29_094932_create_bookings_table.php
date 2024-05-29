<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(){
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('gender');
            $table->string('identity_number', 16);
            $table->foreignId('room_id')->constrained('rooms');
            $table->date('booking_date');
            $table->integer('duration');
            $table->boolean('breakfast')->default(false);
            $table->decimal('discount', 8, 2)->default(0);
            $table->decimal('total_price', 10, 2);
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('bookings');
    }
};
