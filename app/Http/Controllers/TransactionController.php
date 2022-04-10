<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TransactionController extends Controller
{
    function index() {
        $transactions = $this->getAllTransactions();
        $loanTypes = $this->getAllLoanTypes();
        $users = $this->getAllUsers();
        return view('transactions.index', compact('transactions', 'loanTypes', 'users'));
    }

    private function getAllTransactions() {
        $query = Transaction::query()
            ->with('user', 'loan')
            ->orderByDesc('created_at');
        
        if(Gate::denies('view-all-transactions')) {
            $query->where('user_id', auth()->id());
        }
        if(Gate::allows('filter-transactions')) {
            $query->when(request('user_id'), function($query, $user_id) {
                $query->where('user_id', $user_id);
            });
            $query->when(request('loan_type'), function($query, $loan_type) {
                $query->whereHas('loan', function($query) use($loan_type){
                    $query->whereHas('loan', function($query) use($loan_type){
                        $query->where('loan_type', $loan_type);
                    });
                });
            });
        }
            
        return $query->get();
    }

    private function getAllLoanTypes() {
        return Loan::query()->get()->pluck('loan_type_full', 'loan_type');
    }

    private function getAllUsers() {
        return User::query()
        ->where([
            ['is_active', '=', 1],
            ['is_admin', '=', 0],
        ])
        ->orderBy('name')
        ->pluck('name', 'id');
    }
}
