<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $user = Auth::user();
    
    if(!$user){
        return redirect()->route('auth.create'); 
    }
    else{
        redirect()->intended('auth.create'); 
    }
});
Route::middleware([AdminMiddleware::class])->group(function () {
    Route::resource('users', UserController::class);
});

Route::resource('orders',OrderController::class);
Route::resource('posts',PostController::class)->except(['show']);

Route::get('login',fn()=>to_route('auth.create'))->name('login');

Route::resource('auth',AuthController::class)->only(['create','store']);
