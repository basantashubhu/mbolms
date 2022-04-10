<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'users'
], function() {

    Route::get('', [UserController::class, 'index'])->middleware(['auth', 'can:view-users'])->name('users');

});