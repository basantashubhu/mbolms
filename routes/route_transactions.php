<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;

Route::group(['prefix' => 'transactions'], function() {

    Route::get('', [TransactionController::class, 'index'])->middleware(['auth', 'can:view-transactions'])->name('transactions');

});