<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $casts = [
        'next_installment_date' => 'date',
        'last_installment_date' => 'date',
    ];

    public function loanTypeFull() : Attribute 
    {
        return Attribute::get(function($value, $attr) {
            switch($attr['loan_type']) {
                case 'PL': return 'Personal Loan';
                case 'EL': return 'Education Loan';
                case 'CL': return 'Car Loan';
                case 'HL': return 'Home Loan';
                default: return 'N/A';
            }
        });
    }
}
