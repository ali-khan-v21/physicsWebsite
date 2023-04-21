<?php

use App\Http\Controllers\LocalizationController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('index');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contactus', function () {
    return view('contactus');
});
Route::get("/lang/{locale}",[LocalizationController::class,'setLang']);
