<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    function index() {
        $list = $this->getLoanList();
        return view('loans.index', compact('list'));
    }

    private function getLoanList() {
        return Loan::query()
            ->get();
    }

    private function getLoanTypes() {
        return [
            'EL' => 'Education Loan',
            'CL' => 'Car Loan',
            'HL' => 'Home Loan',
            'PL' => 'Personal Loan',
        ];
    }

    function addLoan() {
        $loanTypes = $this->getLoanTypes();
        return view('loans.add', compact('loanTypes'));
    }

    function store(Request $request) {
        $data = $this->validate($request, [
            'loan_type' => 'required',
            'amount' => 'required',
            'interest_rate' => 'required',
            'duration' => 'required',
            'installment' => 'required',
            'criteria' => 'required',
        ]);
        Loan::query()->create($data);
        return redirect()->route('loans')->with('success', 'Loan added successfully.');
    }
}
