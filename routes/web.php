<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RoomController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




Route::post('/save-room/{hotel_id}', [RoomController::class, 'saveRoom'])->name('saveRoom');


//Create New Hotel Details
Route::post('/save-hotel', [HotelController::class, 'saveHotel'])->name('saveHotel');

//View List of Room of the Selected Hotel
Route::get('/view-room/{hotel}', [HotelController::class, 'viewRoom'])->name('viewRoom');

//Update Hotel Details
Route::put('/hotels/{hotel}', [HotelController::class, 'updateHotel'])->name('updateHotel');

//Delete Hotel Details
Route::delete('/hotels/{hotel}', [HotelController::class, 'deleteHotel'])->name('deleteHotel');

//Return to welcome homepage
Route::get('/', [HotelController::class, 'index']);
