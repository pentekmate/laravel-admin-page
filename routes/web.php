<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('users.index');
});
Route::resource('users',UserController::class);
Route::resource('orders',OrderController::class);
Route::resource('posts',PostController::class)->except(['show']);

Route::get('login',fn()=>to_route('auth.create'))->name('login');

Route::resource('auth',AuthController::class)->only(['create','store']);
