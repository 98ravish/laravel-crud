<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register',[AuthController::class,'showRegister']);
Route::post('/register',[AuthController::class,'register']);

Route::get('/login',[AuthController::class,'showLogin'])->name('login');
Route::post('/login',[AuthController::class,'login']);


Route::middleware('auth')->group(function() {
    Route::resource('contacts', ContactController::class);
    Route::get('/dashboard',[ContactController::class,'index']);
    Route::resource('employees', ContactController::class);
    Route::get('/logout',[AuthController::class,'logout']);
});