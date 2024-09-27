<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('users.index');
});
Route::resource('users',UserController::class);

Route::get('login',fn()=>to_route('auth.create'))->name('login');

Route::resource('auth',AuthController::class)->only(['create','store']);
