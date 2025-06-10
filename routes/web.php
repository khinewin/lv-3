<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'auth'], function(){
    Route::get("/register", [AuthController::class, "getRegister"])->name("register");
    Route::post("/register", [AuthController::class, "postRegister"])->name("register");

    Route::get("/login", [AuthController::class, "getLogin"])->name("login");
    Route::post("/login", [AuthController::class, "postLogin"])->name("login");
});

Route::group(['prefix'=>'admin'], function(){
    Route::get("/dashboard", [AdminController::class, "getDashboard"])->name("dashboard");
    Route::get("/logout", [AdminController::class, "getLogout"])->name("logout");
});