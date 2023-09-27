<?php

namespace App\Http\Controllers;
use App\Models\Room;

use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function saveRoom(Request $request, $hotel_id)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'room_name' => 'required|string|max:255',
            'room_type' => 'required|string',
            'price_per_night' => 'required|numeric',
            'room_img' => 'required|string|max:255',
        ]);

        // Create a new room record
        $room = new Room();
        $room->room_name = $validatedData['room_name'];
        $room->room_type = $validatedData['room_type'];
        $room->price_per_night = $validatedData['price_per_night'];
        $room->room_img = $validatedData['room_img'];

        // Associate the room with a hotel using the provided hotel_id
        $room->hotel_id = $hotel_id;

        // Save the room to the database
        $room->save();

        // Redirect back to the previous page or a specific route
        return redirect()->back()->with('success', 'Room created successfully');
    }

}
