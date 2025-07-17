<?php

use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Route::get('/demo',[HomeController::class,'index']);
Route::get('/users',[HomeController::class,'index']);
Route::get('/user/{id}',[HomeController::class,'show']);
Route::post('/user/store',[HomeController::class,'store']);
Route::put('/user/update/{id}',[HomeController::class,'update']);