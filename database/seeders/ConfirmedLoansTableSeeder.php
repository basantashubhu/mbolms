<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ConfirmedLoansTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('confirmed_loans')->delete();
        
        \DB::table('confirmed_loans')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 2,
                'loan_id' => 1,
                'amount' => '10000000.00',
                'loan_terms' => '30.00',
                'interest_rate' => '8.00',
                'installment' => '30000.00',
                'last_installment_date' => '2022-11-10',
                'next_installment_date' => '2022-12-10',
                'created_at' => '2022-04-10 04:31:06',
                'updated_at' => '2022-04-10 04:33:13',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 3,
                'loan_id' => 2,
                'amount' => '400000.00',
                'loan_terms' => '5.00',
                'interest_rate' => '11.00',
                'installment' => '7400.00',
                'last_installment_date' => '2023-04-10',
                'next_installment_date' => '2023-05-10',
                'created_at' => '2022-04-10 04:31:12',
                'updated_at' => '2022-04-10 04:33:06',
            ),
        ));
        
        
    }
}