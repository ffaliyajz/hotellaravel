<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function saveHotel(Request $request)
    {
        // Validate the input data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',     
            'address' => 'required|string|max:255', 
            'img' => 'required|string|max:255', 
        ]);
    
        // Create a new hotel record
        $newHotel = new Hotel();
        $newHotel->name = $validatedData['name'];      
        $newHotel->address = $validatedData['address']; 
        $newHotel->img = $validatedData['img'];
        $newHotel->save();
    
        // Redirect back with a success message or perform any other action
        //return redirect('testModal')->with('success', 'Hotel saved successfully!');
        return back()->with('success', 'Hotel saved successfully!');
    }
    

    public function index()
    {
        $hotels = Hotel::all();
        return view('welcome',compact('hotels'));

    }

    public function deleteHotel(Hotel $hotel)
    {
        $hotel->delete();
        return back()->with('success', 'Hotel deleted successfully!');
    }

    public function updateHotel(Request $request, $id)
    {
        // Find the hotel by ID
        $hotel = Hotel::findOrFail($id);

        // Validate the request data as needed
        if(!empty($request->input('name'))){
            $hotel->name = $request->input('name');
        }

        if(!empty($request->input('address'))){
            $hotel->address = $request->input('address');
        }

        if(!empty($request->input('img'))){
            $hotel->img = $request->input('img');
        }
        
        // Update the hotel's information
        $hotel->save();

        // Redirect to a success page or return a response as needed
       
        return back()->with('success', 'Hotel information updated successfully!');
    }


    public function viewRoom($hotel)
{
    // Retrieve the hotel information by its ID (you may need to adjust this based on your database structure)
    $hotel = Hotel::findOrFail($hotel);

    // Retrieve the available rooms for the selected hotel
    $rooms = Room::where('hotel_id', $hotel->id)->get();

    return view('viewRoom', compact('hotel', 'rooms'));
}

    // public function viewRoom($id)
    // {
    //     // Retrieve hotel data using $id
    //     $hotel = Hotel::find($id); // using Eloquent ORM
        
    //     if (!$hotel) {
    //         return abort(404); // Handle if hotel is not found
    //     }
    
    //     // Return the view with hotel data
    //     return view('viewRoom', compact('room'));
    // }
    

}