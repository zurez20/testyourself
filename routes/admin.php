<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return redirect('admin/login');
});

Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('login', [AuthController::class, 'login']);
Route::post('auth', [AuthController::class, 'checkUser'])->name('auth');
Route::get('forgetpassword', [AuthController::class, 'showforget']);
Route::post('forgetpassword', [AuthController::class, 'forgetPassword']);
Route::post('changepassword', [AuthController::class, 'changepassword']);
Route::get('user', [AdminController::class, 'indexUser']);

Route::middleware(['checkUser'])->group(function () {
  Route::group(
    [
      'prefix' => 'user',
    ],
    function () {
      Route::get('/', [AdminController::class, 'indexUser']);
      Route::post('/add', [AdminController::class, 'addUser']);
      Route::post('/update', [AdminController::class, 'updateUser']);
      Route::post('/delete', [AdminController::class, 'deleteUser']);
    },
  );

  Route::group(
    [
      'prefix' => 'category',
    ],
    function () {
      Route::get('/', [AdminController::class, 'indexCategory']);
      Route::post('/add', [AdminController::class, 'addCategory']);
      Route::post('/update', [AdminController::class, 'updateCategory']);
      Route::post('/delete', [AdminController::class, 'deleteCategory']);
    },
  );

  Route::group(
    [
      'prefix' => 'agerange',
    ],
    function () {
      Route::get('/', [AdminController::class, 'indexAgerange']);
      Route::post('/add', [AdminController::class, 'addAgerange']);
      Route::post('/delete', [AdminController::class, 'deleteAgerange']);
    },
  );

  Route::group(
    [
      'prefix' => 'question',
    ],
    function () {
      Route::get('/', [AdminController::class, 'indexQuestion']);
      Route::post('/add', [AdminController::class, 'addQuestion']);
      Route::post('/delete', [AdminController::class, 'deleteQuestion']);
    },
  );

  Route::group(
    [
      'prefix' => 'player',
    ],
    function () {
      Route::get('/', [AdminController::class, 'indexPlayer']);
      Route::post('/update', [AdminController::class, 'updatePlayer']);
      Route::post('/delete', [AdminController::class, 'deletePlayer']);
    },
  );

  Route::get('dashboard', [AdminController::class, 'indexDashboard']);
});
