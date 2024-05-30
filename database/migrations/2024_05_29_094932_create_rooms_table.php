<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

//kelas untuk migrasi tabel room atau kamar
return new class extends Migration
{
    // untuk membuat tabel room
    public function up(){
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->decimal('price', 8, 2);
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    //untuk menghapus tabel
    public function down(){
        Schema::dropIfExists('rooms');
    }
};
