<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;

Route::get('/', [SessionController::class, 'index']);   

route::resource('user', UserController::class);

Route::get('/session', [SessionController::class, 'index']);
Route::post('/session/login', [SessionController::class, 'login']);


Route::middleware(['auth'])->group(function () {

    Route::middleware(['user'])->group(function () {
        Route::get('/home', function () {
            return view('landing');
        });

        route::resource('room', RoomController::class);
        Route::post('/book-room', [BookController::class, 'store'])->name('book.store');

        Route::get('/history', [HistoryController::class, 'index']);


    });

    
    Route::middleware(['admin'])->group(function () {
        Route::get('/admin/home', function () {
            return view('admin.home');
        })->name('admin.home');
    });
});