<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfirmedLoan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'last_installment_date' => 'date',
        'next_installment_date' => 'date',
    ];

    public function transactions() {
        return $this->hasMany(Transaction::class, 'loan_id');
    }

    public function loan() {
        return $this->belongsTo(Loan::class, 'loan_id');
    }
}
