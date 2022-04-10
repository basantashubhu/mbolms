<?php

namespace App\Http\Controllers;

use App\Models\ConfirmedLoan;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class InstallmentController extends Controller
{
    function index(ConfirmedLoan $loan) {
        return view('installment.index', compact('loan'));
    }

    public function pay(Request $request, ConfirmedLoan $loan)
    {
        $loan->last_installment_date = $loan->next_installment_date;
        $loan->next_installment_date = $loan->next_installment_date->addMonths(1);
        $loan->save();
        Transaction::query()->create([
            'loan_id' => $loan->id,
            'user_id' => $loan->user_id,
            'transaction_type' => 'card',
            'status' => 'success',
            'amount' => $loan->installment,
        ]);
        Log::info('Installment paid for loan #' . $loan->id, $request->all());
        return redirect()->route('dashboard');
    }
}
