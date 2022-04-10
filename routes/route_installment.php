<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InstallmentController;

Route::group(['prefix' => 'installment'], function() {

    Route::get('installment/pay/{loan}', [InstallmentController::class, 'index'])->middleware(['auth', 'can:pay-loan'])->name('installment.pay');
    Route::post('installment/pay/{loan}', [InstallmentController::class, 'pay'])->middleware(['auth', 'can:pay-loan']);

});