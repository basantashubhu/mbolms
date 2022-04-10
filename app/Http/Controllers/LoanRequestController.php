<?php

namespace App\Http\Controllers;

use App\Models\ConfirmedLoan;
use App\Models\Loan;
use App\Models\User;
use App\Models\UserLoan;
use Illuminate\Http\Request;

class LoanRequestController extends Controller
{
    function index() {
        $loanRequests = $this->loanRequests();
        return view('loan_requests.index', compact('loanRequests'));
    }

    private function loanRequests() {
        return Loan::query()
        ->select([
            'loans.loan_type', 'loans.interest_rate',
            'user_loans.loan_terms','user_loans.amount', 'user_loans.installment', 'user_loans.id',
            'users.name', 'users.email', 'users.sex'
        ])
        ->leftJoin('user_loans', 'user_loans.loan_id', '=', 'loans.id')
        ->leftJoin('users', 'users.id', '=', 'user_loans.user_id')
        ->where([
            ['users.is_active', '=', 1],
            ['users.is_admin', '=', 0],
            ['user_loans.is_approved', '=', 0]
        ])->get();
    }

    function approve(UserLoan $userLoan) {
        $confirmed_loan = ConfirmedLoan::query()->create([
            'user_id' => $userLoan->user_id,
            'loan_id' => $userLoan->loan_id,
            'amount' => $userLoan->amount,
            'loan_terms' => $userLoan->loan_terms,
            'interest_rate' => $userLoan->loan->interest_rate,
            'installment' => $userLoan->installment,
            'next_installment_date' => date_create('now + 1 month')->format('Y-m-d')
        ]);
        $userLoan->update([
            'is_approved' => true
        ]);
        return response()->json([
            'message' => 'Loan request approved successfully.',
            'id' => $confirmed_loan->id
        ]);
    }
}
