<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AirportConController;
use App\Http\Controllers\AirlineController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\SignupController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AirportConController::class, 'index']);

Route::get('/show_airport', [AirportConController::class, 'show']);
Route::get('/add_airport', [AirportConController::class,'create']);
Route::get('/show_airport/update/{airportCon}', [AirportConController::class, 'edit']);
Route::post('show_airport/update/{airportCon}', [AirportConController::class, 'update']);
Route::get('/show_airport/delete/{airportCon}', [AirportConController::class, 'destroy']);
Route::post('/store_airport', [AirportConController::class, 'store']);

Route::get('/show_airline', [AirlineController::class, 'show']);
Route::get('/add_airline', [AirlineController::class,'create']);
Route::get('/show_airline/update/{airline}', [AirlineController::class, 'edit']);
Route::post('show_airline/update/{airline}', [AirlineController::class, 'update']);
Route::get('/show_airline/delete/{airline}', [AirlineController::class, 'destroy']);
Route::post('store_airline', [AirlineController::class, 'store']);

Route::get('/show_country', [CountryController::class, 'show']);
Route::get('/add_country', [countryController::class,'create']);
Route::get('/show_country/update/{country}', [countryController::class, 'edit']);
Route::post('show_country/update/{country}', [countryController::class, 'update']);
Route::get('/show_country/delete/{country}', [countryController::class, 'destroy']);
Route::post('store_country', [countryController::class, 'store']);

Route::get('/show_airport/search', [AirportConController::class, 'search']);

Route::get('/show_countryNoAirline', [countryController::class, 'countryNoAirport']);
Route::get('/show_countryNoAirlineNoAirport', [countryController::class, 'countryNoAirportNoAirport']);


Auth::routes();

Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
