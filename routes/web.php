<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function ()  {
    return view('index');
});

Route::post('store_users', [UserController::class, 'store'])->name('store_users');
