<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\AirlinesController;
use App\Http\Controllers\CountriesController;
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


Route::get('/Airports', [AirportsController::class,'index']);
Route::get('/', [AirportsController::class,'redirect']);


Route::get('/New_Airports', [AirportsController::class,'create']);

Route::post('/Store_Airports', [AirportsController::class,'store']);

Route::get('/Show_Airports', [AirportsController::class,'show']);

Route::post('/Update_Airports', [AirportsController::class,'update']);

Route::get('/Edit_Airports', [AirportsController::class,'edit']);

Route::get('/Delete_Airports', [AirportsController::class,'destroy']);


Route::get('/Airlines', [AirlinesController::class,'index']);


Route::get('/New_Airline', [AirlinesController::class,'create']);

Route::post('/Store_Airlines', [AirlinesController::class,'store']);

Route::get('/Edit_Airlines', [AirlinesController::class,'edit']);

Route::post('/Update_Airlines', [AirlinesController::class,'update']);

Route::get('/Delete_Airlines', [AirlinesController::class,'destroy']);


Route::get('/Countries', [CountriesController::class,'index']);



Route::get('/New_Country', [CountriesController::class,'create']);

Route::post('/Store_Countries', [CountriesController::class,'store']);

Route::get('/Show_Countries', [CountriesController::class,'show']);

Route::get('/Edit_Countries', [CountriesController::class,'edit']);

Route::post('/Update_Countries', [CountriesController::class,'update']);

Route::get('/Delete_Countries', [CountriesController::class,'destroy']);


Route::get('/Show_Airports/search', [AirportsConController::class, 'search']);


Route::get('/Countries_without_airlines', [CountriesController::class, 'Countries_without_airlines']);

Route::get('/Countries_without_airlines_and_airports', [countriesController::class, 'Countries_without_airlines_and_airports']);

