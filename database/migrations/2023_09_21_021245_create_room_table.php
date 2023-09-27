<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       // Define the "room" table structure
        Schema::create('room', function (Blueprint $table) {
            $table->id();
            $table->string('room_name');
            $table->string('room_type');
            $table->decimal('price_per_night', 8, 2);
            $table->string('room_img')->nullable();
            $table->foreignId('hotel_id')->nullable()->constrained('hotel');s
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room');
    }
};
