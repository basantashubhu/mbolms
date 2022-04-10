<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\User;
use Illuminate\Http\Request;

class UserLoanController extends Controller
{
    function index() {
        $loans = $this->getAllLoans();
        return view('user_loans.index', compact('loans'));
    }

    private function getAllLoans() {
        return Loan::query()
        ->select([
            'loans.loan_type', 'confirmed_loans.interest_rate',
            'confirmed_loans.loan_terms','confirmed_loans.amount', 'confirmed_loans.installment', 'confirmed_loans.id',
            'users.name', 'users.email', 'users.sex'
        ])
        ->leftJoin('confirmed_loans', 'confirmed_loans.loan_id', '=', 'loans.id')
        ->leftJoin('users', 'users.id', '=', 'confirmed_loans.user_id')
        ->where([
            ['users.is_active', '=', 1],
            ['users.is_admin', '=', 0],
        ])->get();
    }
}
