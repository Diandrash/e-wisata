<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\BookingController;

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

Route::get('/', function () {
    return view('welcome', [
        'title' => 'Beranda'
    ]);
});

Route::get('/home', function () {
    return view('welcome', [
        'title' => 'Beranda'
    ]);
});

Route::get('/login', [LoginController::class, 'login']);
Route::post('/login', [LoginController::class, 'auth']);
Route::get('/register', [LoginController::class, 'register']);
Route::post('/register', [LoginController::class, 'store']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/places', [PlaceController::class,'index']);
Route::post('/places/search', [PlaceController::class,'search']);
Route::post('/places/category', [PlaceController::class,'category']);
Route::get('/places/{place}/show', [PlaceController::class,'show']);





Route::get('/myplaces', [PlaceController::class,'myindex']);
Route::get('/myplaces/create', [PlaceController::class,'create']);
Route::post('/myplaces/create', [PlaceController::class,'store']);
Route::get('/myplaces/{place}/edit', [PlaceController::class,'edit']);
Route::put('/myplaces/{place}/edit', [PlaceController::class,'update']);
Route::delete('/myplaces/{place}/delete', [PlaceController::class,'destroy']);

Route::post('/places/{place}/checkout', [BookingController::class, 'checkout']);
Route::post('/places/{place}/checkout/order', [BookingController::class, 'store']);
Route::get('/bookings', [BookingController::class, 'index']);
Route::get('/mybookings', [BookingController::class, 'myindex']);
Route::put('/mybookings/{booking}/edit', [BookingController::class, 'update']);

