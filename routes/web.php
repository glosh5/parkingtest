<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\parkedcarController;
use App\Http\Controllers\ParkingplaceController;
use App\Http\Controllers\Usecontroller;
use App\Http\Controllers\vehiclesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::post('/signinIn', [LoginController::class, 'login'])->name('signingIn');

Auth::routes();
Route::get('parking/show', [ParkingplaceController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin',  'middleware' => ['auth', 'admin'], 'as' => 'admin.'], function () {
    Route::get('/', [AdminController::class, 'index']);
    // Route::resource('users','Usecontroller');
    Route::post('users/create', [Usecontroller::class, 'create']);
    Route::get('users/create', [AdminController::class, 'index2']);

    Route::get('users/', [Usecontroller::class, 'show']);
    Route::get('users/edit/{id}', [Usecontroller::class, 'showEdit']);
    Route::post('users/update/{id}', [Usecontroller::class, 'updateuser']);
    Route::get('users/delete/{id}', [Usecontroller::class, 'delete']);


    Route::get('vehicles/show', [vehiclesController::class, 'show']);
    Route::get('vehicles/', [vehiclesController::class, 'index']);
    Route::post('vehicles/create', [vehiclesController::class, 'create'])->name("createVehicle");
    Route::get('vehicles/edit/{id}',[vehiclesController::class,'showedit']);
    Route::post('vehicles/edit2/{id}',[vehiclesController::class,'edit']);
    Route::get('vehicles/delete/{id}',[vehiclesController::class,'delete']);
    Route::get('parking/', [ParkingplaceController::class, 'index']);
    Route::get('parking/edit/{id}',[ParkingplaceController::class,'showEdit']);
    Route::post('parking/edit2/{id}',[ParkingplaceController::class,'edit']);
    Route::get('parking/delete/{id}',[ParkingplaceController::class,'delete']);
    Route::get('users/message/{id}',[Usecontroller::class,'showmessage']);
    Route::post('users/messages',[Usecontroller::class,'messages']);

    Route::get('parking/create', [ParkingplaceController::class, 'show']);
    Route::post('parking/creates', [ParkingplaceController::class, 'create']);
    Route::get('parking/slots/{id}', [ParkingplaceController::class, 'showslots']);
    Route::get('parking/slots/edit/{id}', [ParkingplaceController::class, 'getSlotEdit']);
    Route::post('parking/slots/edit2/{id}', [ParkingplaceController::class, 'editslot']);
    Route::get('parking/slots/delete/{id}', [ParkingplaceController::class, 'deleteslot']);
    Route::post('parking/slots/create/{id}', [ParkingplaceController::class, 'slotscreate']);
    Route::get('parking/slots/show/{id}', [ParkingplaceController::class, 'showslotsData']);
    Route::get('parkedCar/', [parkedcarController::class, 'index']);
    Route::post('parkedCar/create', [parkedcarController::class, 'create']);
    Route::get('parkedCar/parkedVehicles', [parkedcarController::class, 'show']);
    Route::get('parkedCar/checkout/{recordId}/{vehicleId}', [parkedcarController::class, 'checkout']);
});

Route::group(['prefix' => 'user',  'middleware' => ['auth'], 'as' => 'user.'], function () {
    Route::get('/', [AdminController::class, 'index']);
    // Route::resource('users','Usecontroller');
    Route::post('users/create', [Usecontroller::class, 'create']);
    Route::get('users/create', [AdminController::class, 'index2']);

    Route::get('users/', [Usecontroller::class, 'show']);
    Route::get('users/edit/{id}', [Usecontroller::class, 'showEdit']);
    Route::post('users/update/{id}', [Usecontroller::class, 'updateuser']);
    Route::get('users/delete/{id}', [Usecontroller::class, 'delete']);


    Route::get('vehicles/show', [vehiclesController::class, 'show']);
    Route::get('vehicles/', [vehiclesController::class, 'index']);
    Route::post('vehicles/create', [vehiclesController::class, 'create'])->name("createVehicle");
    Route::get('vehicles/edit/{id}',[vehiclesController::class,'showedit']);
    Route::post('vehicles/edit2/{id}',[vehiclesController::class,'edit']);
    Route::get('vehicles/delete/{id}',[vehiclesController::class,'delete']);
    Route::get('parking/', [ParkingplaceController::class, 'index']);
    Route::get('parking/edit/{id}',[ParkingplaceController::class,'showEdit']);
    Route::post('parking/edit2/{id}',[ParkingplaceController::class,'edit']);
    Route::get('parking/delete/{id}',[ParkingplaceController::class,'delete']);
    Route::get('users/message/{id}',[Usecontroller::class,'showmessage']);
    Route::post('users/messages',[Usecontroller::class,'messages']);

    Route::get('parking/create', [ParkingplaceController::class, 'show']);
    Route::post('parking/creates', [ParkingplaceController::class, 'create']);
    Route::get('parking/slots/{id}', [ParkingplaceController::class, 'showslots']);
    Route::get('parking/slots/edit/{id}', [ParkingplaceController::class, 'getSlotEdit']);
    Route::post('parking/slots/edit2/{id}', [ParkingplaceController::class, 'editslot']);
    Route::get('parking/slots/delete/{id}', [ParkingplaceController::class, 'deleteslot']);
    Route::post('parking/slots/create/{id}', [ParkingplaceController::class, 'slotscreate']);
    Route::get('parking/slots/show/{id}', [ParkingplaceController::class, 'showslotsData']);
    Route::get('parkedCar/', [parkedcarController::class, 'index']);
    Route::post('parkedCar/create', [parkedcarController::class, 'create']);
    Route::get('parkedCar/parkedVehicles', [parkedcarController::class, 'show']);
    Route::get('parkedCar/checkout/{recordId}/{vehicleId}', [parkedcarController::class, 'checkout']);
});