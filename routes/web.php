<?php

use App\Http\Controllers\PersonController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'fizzBuzz'])->name('fizzBuzz');

Route::resource('persons', PersonController::class);

