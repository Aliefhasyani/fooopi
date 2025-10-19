<?php

use App\Http\Controllers\AddressessController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\StateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register',[ApiController::class,'register']);
Route::post('/login',[ApiController::class,'login']);

Route::apiResource('/city',CityController::class);
Route::apiResource('/country',CountryController::class);
Route::apiResource('/address',AddressessController::class);
Route::apiResource('/state',StateController::class);
