<?php

namespace App\Http\Controllers;

use App\Models\ConfirmedLoan;
use App\Models\Loan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    function dashboard()
    {
        $newUserCount = $this->getUserCount();
        $loanAmount = $this->getLoanAmount();
        $pendingRequests = $this->getPendingRequests();
        $loans = $this->getLoans();
        return view('dashboard', compact('newUserCount', 'loanAmount', 'pendingRequests', 'loans'));
    }

    private function getUserCount() {
        return User::query()
            ->whereMonth('created_at', '=', date('m'))
            ->where([
                ['is_admin', '=', 0],
                ['is_active', '=', 1],
            ])
            ->count();
    }

    private function getLoanAmount() {
        return ConfirmedLoan::query()->sum('amount');
    }

    private function getPendingRequests() {
        return User::query()
            ->where([
                ['is_admin', '=', 0],
                ['is_active', '=', 0],
            ])
            ->count();
    }

    private function getLoans() {
        if(Gate::denies('view-my-loans')) {
            return [];
        }

        $query = Loan::query()
        ->select([
            'loans.loan_type', 'confirmed_loans.interest_rate',
            'confirmed_loans.loan_terms','confirmed_loans.amount', 'confirmed_loans.installment', 'confirmed_loans.id',
            'confirmed_loans.created_at', 'confirmed_loans.next_installment_date', 'confirmed_loans.last_installment_date',
            DB::raw('(select sum(amount) from transactions where transactions.loan_id = confirmed_loans.id) as paid_amount'),
            'users.name', 'users.email', 'users.sex'
        ])
        ->leftJoin('confirmed_loans', 'confirmed_loans.loan_id', '=', 'loans.id')
        ->leftJoin('users', 'users.id', '=', 'confirmed_loans.user_id')
        ->where([
            ['users.is_active', '=', 1],
            ['users.is_admin', '=', 0],
        ]);

        if(Gate::denies('view-all-loans')) {
            $query->where('users.id', '=', auth()->id());
        }

        return $query->get();
    }
}
