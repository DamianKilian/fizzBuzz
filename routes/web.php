<?php

use App\Http\Controllers\PersonController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/fizz-buzz', [App\Http\Controllers\HomeController::class, 'fizzBuzz'])->name('fizzBuzz');
Route::post('/publish', [App\Http\Controllers\HomeController::class, 'publish'])->name('publish');

Route::resource('persons', PersonController::class);

