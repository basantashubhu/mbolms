<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    function index() {
        $loans = $this->getAllLoans();
        return view('welcome', compact('loans'));
    }

    private function getAllLoans() {
        return Loan::query()
            ->get();
    }
}
