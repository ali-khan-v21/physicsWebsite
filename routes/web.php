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
Route::prefix('/tag')->group(function(){

    Route::get("/{subject}",[ArticleController::class,"tag_all"]);
    // Route::get("/{subject}/{id}",[ArticleController::class,"tag_show"]);
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
    Route::get("/pending_posts",[AdminController::class,'pendingPosts'])->name('pendingPosts');
    Route::get("/pending_posts/accept/{id}",[AdminController::class,'acceptPendingPost'])->name('acceptPendingPosts');
    Route::get("/pending_posts/delete/{id}",[AdminController::class,'deletePendingPost'])->name('deletePendingPosts');
    Route::get("/pending_posts/deactivate/{id}",[AdminController::class,'deactivatePost'])->name('deactivatePosts');

    Route::get("/deletecomment/{id}",[AdminController::class,'deletecomment']);
    Route::get("/acceptcomment/{id}",[AdminController::class,'acceptcomment']);
    Route::post("/replytocomment/{id}",[AdminController::class,'replytocomment']);
    Route::get("/users/edit/{id}",[AdminController::class,'edituser']);
    Route::get("/users/deactivate/{id}",[AdminController::class,'deactivateuser']);
    Route::get("/users/delete/{id}",[AdminController::class,'deleteuser']);

});







Auth::routes(['verify'=>true]);


