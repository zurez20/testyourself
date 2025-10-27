<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;


Route::get('/', [WebController::class, 'home']);
Route::get('/about', [WebController::class, 'about']);
Route::get('/category', [WebController::class, 'category']);
Route::get('/howtoplay', [WebController::class, 'howtoplay']);
Route::get('/subject', [WebController::class, 'subject']);
Route::post('/login', [WebController::class, 'login'])->name('player.login');
Route::post('/register', [WebController::class, 'register'])->name('player.register');
Route::post('/login', [WebController::class, 'login'])->name('player.login');
Route::post('/register', [WebController::class, 'register'])->name('player.register');
Route::get('/login', [WebController::class, 'loginGet']);
Route::get('/register', [WebController::class, 'registerGet']);
Route::get('/logout', [WebController::class, 'logout'])->name('player.logout');

Route::middleware('auth:player')->group(function () {
    Route::get('/agegroup', [WebController::class, 'agegroup']);
});
