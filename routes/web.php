<?php

use App\Http\Controllers\ArticleController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocalizationController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class,"index"])->name('index');


Route::get("/lang/{locale}",[LocalizationController::class,'setLang']);

Route::prefix('/article')->group(function(){

    Route::get("/{subject}",[ArticleController::class,"all"]);
    Route::get("/{subject}/{id}",[ArticleController::class,"show"]);
});

Route::get("/login-form",[HomeController::class,"loginForm"])->name('login-form');
Route::post("/login-user",[HomeController::class,"loginUser"])->name('login-user');



