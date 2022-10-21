<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\AirlineController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\AirportsController;
use App\Http\Controllers\Admin\AdminAuthController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [AirportsController::class,'index']);



Route::get('/New_Airports', [AirportsController::class,'create']);

Route::post('/Store_Airports', [AirportsController::class,'store']);

Route::get('/Show_Airports', [AirportsController::class,'show']);

Route::post('/Update_Airports', [AirportsController::class,'update']);

Route::get('/Edit_Airports', [AirportsController::class,'edit']);

Route::get('/Delete_Airports', [AirportsController::class,'destroy']);


    




Route::get('/oro_linijos', function () {
    return view('Airline.Airlines');
});

Route::get('/Airports', function () {
    return view('Airports');
});

Route::get('/Airlines', function () {
    return view('Airlines');
});

Route::get('/Airlines_edit', function () {
    return view('Airlines_edit');
});

Route::get('/Airlines_delete', function () {
    return view('Airlines_delete');
});



Route::get('/Countries', function () {
    return view('Countries');
});


Route::get('/Add_Airline', function () {
    return view('Add_Airline');
});

Route::get('/Remove_Airline', function () {
    return view('Remove_Airline');
});

Route::get('/Edit', function () {
    return view('Edit');
});

Route::get('/Delete', function () {
    return view('Delete');
});

Route::get('/New_Country', function () {
    return view('New_Country');
});

Route::get('/Countries_without_airlines', function () {
    return view('Countries_without_airlines');
});

Route::get('/Countries_without_airlines_and_airports', function () {
    return view('Countries_without_airlines_and_airports');
});

Route::get('/Countries_Edit', function () {
    return view('Countries_Edit');
});

Route::get('/Countries_Delete', function () {
    return view('Countries_Delete');
});

Route::get('/New_Airline', function () {
    return view('New_Airline');
});
