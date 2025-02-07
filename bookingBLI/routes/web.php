<?php

use App\Http\Controllers\BookController;
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

Route::get('/book', [BookController::class, 'index']);

