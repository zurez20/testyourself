<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return redirect('login');
});

Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('login', [AuthController::class, 'login']);
Route::post('auth', [AuthController::class, 'checkUser'])->name('auth');
Route::get('forgetpassword', [AuthController::class, 'showforget']);
Route::post('forgetpassword', [AuthController::class, 'forgetPassword']);
Route::post('changepassword', [AuthController::class, 'changepassword']);

Route::middleware(['checkUser'])->group(function () {
  Route::get('dashboard', [AdminController::class, 'indexDashboard']);
});