<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoanRequestController;

Route::group(['prefix' => 'loan-requests'], function() {

    Route::get('', [LoanRequestController::class, 'index'])->middleware(['auth', 'can:view-loan-requests'])->name('loan.requests');
    Route::post('approve/{userLoan}', [LoanRequestController::class, 'approve'])->middleware(['auth', 'can:approve-loan-requests'])->name('loan.requests.approve');
    
});