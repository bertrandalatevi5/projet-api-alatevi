<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/documentation', function ()  {
    return redirect('/swagger-ui/dist/index.html');
});

Route::post('store_users', [UserController::class, 'store'])->name('store_users');
