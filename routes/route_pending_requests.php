<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PendingRequestController;

Route::group([
    'prefix' => 'pending-requests', 
], function() {
    Route::get('', [PendingRequestController::class, 'index'])->middleware(['auth', 'can:view-pending-requests'])->name('pending.requests');
    Route::post('approve/{user}', [PendingRequestController::class, 'approveUser'])->middleware(['auth', 'can:approve-pending-requests'])->name('pending.requests.approve');
});