<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // Define the data you want to seed
       $hotels = [
        [
            'name' => 'Hotel Swiss Garden',
            'address' => 'Kuala Lumpur, Selangor',
            'img' => 1,
        ],
        [
            'name' => 'Hotel BayView',
            'address' => 'Kulim, Kedah',
            'img' => 2,
        ],
        [
            'name' => 'The Granite 88 Hotel',
            'address' => 'Genting Highlands, Pahang',
            'img' => 5,
        ],
        [
            'name' => 'Double Tree Hilton Hotel',
            'address' => 'Jengka, Pahang',
            'img' => 5,
        ],
        // Add more hotel data as needed
    ];

    // Insert the data into the 'hotels' table
    DB::table('hotel')->insert($hotels);
    }
}
