<?php

use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;

Route::get('/', [SessionController::class, 'index']);   

route::resource('user', UserController::class);

Route::get('/home', function () {
    return view('landing');
});

Route::get('/session', [SessionController::class, 'index']);
Route::post('/session/login', [SessionController::class, 'login']);

// Route::get('/room', [RoomController::class, 'index']);
// Route::get('/room/{name}', [RoomController::class, 'show'])->name('room.show');

route::resource('room', RoomController::class);

