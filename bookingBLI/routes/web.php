<?php

use App\Http\Controllers\AdminActiveController;
use App\Http\Controllers\AdminHistoryController;
use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\AdminPendingController;
use App\Http\Controllers\AdminRoomController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\NotificationController;
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

    Route::middleware('auth')->group(function () {
        Route::delete('/notifications/{notification}', [NotificationController::class, 'destroy'])->name('notifications.destroy');
        Route::delete('/notifications', [NotificationController::class, 'clearAll'])->name('notifications.clear');
        Route::post('/notifications/mark-read', [NotificationController::class, 'markAsRead'])->name('notifications.mark-read');
    });
    
    Route::middleware(['user'])->group(function () {
        Route::get('/home', [LandingController::class, 'index'])->name('home.index');
        
        route::resource('room', RoomController::class);
        Route::post('/rooms/{room}/favorite', [FavoriteController::class, 'store'])->name('favorites.store');
        Route::delete('/rooms/{room}/favorite', [FavoriteController::class, 'destroy'])->name('favorites.destroy');
        
        Route::get('/favorite', [FavoriteController::class, 'index'])->name('favorite.index');
        Route::post('/book-room', [BookController::class, 'store'])->name('book.store');

        Route::get('/history', [HistoryController::class, 'index'])->name('history.index');
        Route::delete('/history/delete', [HistoryController::class, 'destroy'])->name('history.destroy');

        Route::get('/logout', [SessionController::class, 'logout'])->name('logout');
    });
    
    Route::middleware(['admin'])->group(function () {
        Route::get('/admin/home', [AdminHomeController::class, 'index'])->name('admin.home.index');
        Route::post('/admin/home/change', [AdminHomeController::class, 'change'])->name('admin.home.change');

        Route::get('/admin/pending', [AdminPendingController::class, 'index'])->name('admin.pending.index');
        Route::post('/admin/pending/change', [AdminPendingController::class, 'change'])->name('admin.pending.change');

        Route::get('/admin/active', [AdminActiveController::class, 'index'])->name('admin.active.index');

        Route::get('/admin/room' ,[AdminRoomController::class, 'index']);
        })->name('admin.room');

        Route::get('admin/room/index', [AdminRoomController::class, 'index'])->name('admin.room.index');

        Route::post('/admin/room/change', [AdminRoomController::class, 'change'])->name('admin.room.change');

        Route::get('admin/history', [AdminHistoryController::class, 'index'])->name('admin.history.index');
        Route::get('/logout', [SessionController::class, 'logout'])->name('logout');
    });
