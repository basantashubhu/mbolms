<?php

use App\Http\Controllers\LoanController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'loans',
], function() {

    Route::get('', [LoanController::class, 'index'])->middleware(['auth', 'can:view-loans'])->name('loans');
    Route::get('add', [LoanController::class, 'addLoan'])->middleware(['auth', 'can:add-loans'])->name('loans.add');
    Route::post('store', [LoanController::class, 'store'])->middleware(['auth', 'can:store-loans'])->name('loans.store');

});