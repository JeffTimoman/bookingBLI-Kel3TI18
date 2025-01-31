<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('user',[UserController::class, 'index']);
Route::get('siswa/{id}', [UserController::class, 'detail'])->where('id', '[0-9]+');