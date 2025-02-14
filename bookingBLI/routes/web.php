<?php

use App\Http\Controllers\FavoriteController;
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
        Route::post('/rooms/{room}/favorite', [FavoriteController::class, 'store'])->name('favorites.store');
        Route::delete('/rooms/{room}/favorite', [FavoriteController::class, 'destroy'])->name('favorites.destroy');
        
        Route::get('/favorite', function () {
            return view('favorite.index');
        });
    });
    
    Route::middleware(['admin'])->group(function () {
        Route::get('/admin/home', function () {
            return view('user.create');
        })->name('admin.home');
    });
});