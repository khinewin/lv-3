<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FrontendController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get("/", [FrontendController::class, "getWelcome"])->name("home");
Route::get("/post/{id}", [FrontendController::class, "getPostDetails"])->name("post_details");
Route::get("/user/{user_id}/posts", [FrontendController::class, "getPostsByUser"])->name("post-by-user");
Route::get("/posts/search", [FrontendController::class, "getPostsSearch"])->name("posts_search");

Route::group(['prefix'=>'auth'], function(){
    Route::get("/register", [AuthController::class, "getRegister"])->name("register");
    Route::post("/register", [AuthController::class, "postRegister"])->name("register");

    Route::get("/login", [AuthController::class, "getLogin"])->name("login");
    Route::post("/login", [AuthController::class, "postLogin"])->name("login");
});

Route::group(['prefix'=>'admin'], function(){ //["middleware"=>"auth"]
    Route::get("/dashboard", [AdminController::class, "getDashboard"])->name("dashboard");
    Route::get("/logout", [AdminController::class, "getLogout"])->name("logout");
    Route::get("/profile", [AdminController::class, "getProfile"])->name("profile");
    Route::post("/update/password", [AdminController::class, "updatePassword"])->name("update.password");


    Route::group(['prefix'=>'posts'], function(){
        Route::get("/new", [PostController::class, "getNewPost"])->name("new_post");
        Route::post("/new", [PostController::class, "postNewPost"])->name("new_post");
        Route::get("/show", [PostController::class, "getShowPosts"])->name("show_posts");
        Route::get("/{id}/delete", [PostController::class, "getDeletePost"])->name("delete_post");
        Route::get("/{id}/edit", [PostController::class, "getEditPost"])->name("edit_post");
        Route::post("/update", [PostController::class, "postUpdatePost"])->name("update_post");
        Route::get("/search", [PostController::class, "getPostsSearch"])->name("admin_posts_search");
    });

});

