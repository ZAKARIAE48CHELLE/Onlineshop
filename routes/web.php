<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Informatic_controller;
use App\Http\Controllers\SportController;
use App\Http\Controllers\SupermarcheController;

Route::resource('informatic', informatic_controller::class); 
Route::resource('marche', SupermarcheController::class); 
Route::resource('sport', SportController::class); 
Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', function () {
    return view('about');
});
