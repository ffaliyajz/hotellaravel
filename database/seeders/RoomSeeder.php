<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomSeeder extends Seeder
{
    public function run()
    {
        // Define the data you want to seed for the 'room' table
        $rooms = [
            [
                'room_name' => 'Akasian Room',
                'room_type' => 'Single',
                'price_per_night' => 100.00,
                'room_img' => '11',
                'hotel_id' => 1, 
            ],
            [
                'room_name' => 'Malayan Room',
                'room_type' => 'Double',
                'price_per_night' => 200.00,
                'room_img' => '12',
                'hotel_id' => 1, 
            ],
            [
                'room_name' => 'Cendana Room ',
                'room_type' => 'Suite',
                'price_per_night' => 300.00,
                'room_img' => '13',
                'hotel_id' => 1, 
            ],
            // Add more room data as needed
        ];

        // Insert the data into the 'rooms' table
        DB::table('room')->insert($rooms);
    }
}
