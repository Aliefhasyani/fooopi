<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\CityController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register',[ApiController::class,'register']);
Route::post('/login',[ApiController::class,'login']);

Route::apiResource('/city',CityController::class)->middleware(['auth:sanctum']);
