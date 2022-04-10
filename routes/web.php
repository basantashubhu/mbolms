<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontendController::class, 'index']);

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');


require __DIR__.'/auth.php';
require __DIR__.'/route_pending_requests.php';
require __DIR__.'/route_loans.php';
require __DIR__.'/route_users.php';
require __DIR__.'/route_loan_requests.php';
require __DIR__.'/route_user_loans.php';
require __DIR__.'/route_transactions.php';
require __DIR__.'/route_installment.php';
