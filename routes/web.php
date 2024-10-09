<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::resource('/',UserController::class);
Route::resource('/user',UserController::class);
Route::resource('/user/{user_id}',UserController::class);