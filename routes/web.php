<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ArticleController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocalizationController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class,"index"])->name('index');
Route::get('/about', [HomeController::class,"aboutus"])->name('about');


Route::get("/lang/{locale}",[LocalizationController::class,'setLang']);

Route::prefix('/article')->group(function(){

    Route::get("/{subject}",[ArticleController::class,"all"]);
    Route::get("/{subject}/{id}",[ArticleController::class,"show"]);
});
Route::prefix('/admin')->group(function(){

    Route::get("/",[AdminController::class,"index"])->name("admin_dashboard");
    Route::get("/newpost",[AdminController::class,"newpost"])->name("admin_newpost");
    Route::post("/newpost",[AdminController::class,"addPost"]);
    Route::get("/edit/{id}",[AdminController::class,"editPost"]);
    Route::post("/edit/{id}",[AdminController::class,"updatePost"]);
    Route::get("/softDelete/{id}",[AdminController::class,"softDelete"]);
    Route::get("/forceDelete/{id}",[AdminController::class,"forceDelete"]);
    Route::get("/restore/{id}",[AdminController::class,"restore"]);
    Route::get("/trashed",[AdminController::class,"trashed"]);

});

Route::get("/login-form",[HomeController::class,"loginForm"])->name('login-form');
Route::post("/login-user",[HomeController::class,"loginUser"])->name('login-user');



