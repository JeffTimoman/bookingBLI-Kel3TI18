<?php

use App\Http\Controllers\AdminRoomController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use Illuminate\Container\Attributes\Auth;



Route::middleware(['notauth'])->group(function () {
    Route::redirect('/', '/loginpage');
    Route::get('/loginpage', [SessionController::class, 'index'])->name('loginpage');
    Route::post('/session/login', [SessionController::class, 'login']);
});

Route::middleware(['auth'])->group(function () {
    
    Route::middleware(['user'])->group(function () {
        Route::get('/home', function () {
            return view('landing');
        });
        
        route::resource('room', RoomController::class);
        Route::post('/rooms/{room}/favorite', [FavoriteController::class, 'store'])->name('favorites.store');
        Route::delete('/rooms/{room}/favorite', [FavoriteController::class, 'destroy'])->name('favorites.destroy');
        
        Route::get('/favorite', [FavoriteController::class, 'index'])->name('favorite.index');
        Route::post('/book-room', [BookController::class, 'store'])->name('book.store');

        Route::get('/history', [HistoryController::class, 'index']);

        Route::get('/logout', [SessionController::class, 'logout'])->name('logout');
    });
    
    Route::middleware(['admin'])->group(function () {
        Route::get('/admin/home', function () {
            return view('admin.home');  
        })->name('admin.home');

        Route::get('/admin/room' ,[AdminRoomController::class, 'index']);
        })->name('admin.room');

        Route::get('admin/room/index', [AdminRoomController::class, 'index'])->name('admin.room.index');

        Route::post('/admin/room/change', [AdminRoomController::class, 'change'])->name('admin.room.change');
        Route::get('/logout', [SessionController::class, 'logout'])->name('logout');
    });
