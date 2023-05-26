<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\LocalizationController;

Route::get('/', [HomeController::class,"index"])->name('index');
Route::get('/about', [HomeController::class,"aboutus"])->name('about');
Route::post('/postcomment',[HomeController::class,"postcomment"]);

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
    Route::get("/users",[AdminController::class,'users'])->name('users');
    Route::get("/comments",[AdminController::class,'comments'])->name('comments');
    Route::post("/users",[AdminController::class,'editRole'])->name('editrole');
    Route::get("/deletecomment/{id}",[AdminController::class,'deletecomment']);
    Route::get("/acceptcomment/{id}",[AdminController::class,'acceptcomment']);
    Route::post("/replytocomment/{id}",[AdminController::class,'replytocomment']);
    Route::get("/users/edit/{id}",[AdminController::class,'edituser']);
    Route::get("/users/deactivate/{id}",[AdminController::class,'deactivateuser']);
    Route::get("/users/delete/{id}",[AdminController::class,'deleteuser']);

});


Route::get("/login-form",[HomeController::class,"loginForm"])->name('login-form');
Route::post("/login-user",[HomeController::class,"loginUser"])->name('login-user');




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
