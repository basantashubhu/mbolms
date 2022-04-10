<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserLoanController;

Route::group(['prefix' => 'user-loans'], function() {

    Route::get('', [UserLoanController::class, 'index'])->middleware(['auth', 'can:view-user-loans'])->name('user.loans');

});