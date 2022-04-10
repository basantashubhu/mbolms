<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserLoansTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('user_loans')->delete();
        
        \DB::table('user_loans')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 2,
                'loan_id' => 1,
                'loan_type' => 'HL',
                'loan_terms' => '30.00',
                'amount' => '10000000.00',
                'installment' => '30000.00',
                'is_approved' => 1,
                'created_at' => NULL,
                'updated_at' => '2022-04-10 04:31:06',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 3,
                'loan_id' => 2,
                'loan_type' => 'PL',
                'loan_terms' => '5.00',
                'amount' => '400000.00',
                'installment' => '7400.00',
                'is_approved' => 1,
                'created_at' => NULL,
                'updated_at' => '2022-04-10 04:31:12',
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => 4,
                'loan_id' => 3,
                'loan_type' => 'CL',
                'loan_terms' => '4.00',
                'amount' => '1500000.00',
                'installment' => '35000.00',
                'is_approved' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'user_id' => 5,
                'loan_id' => 4,
                'loan_type' => 'EL',
                'loan_terms' => '4.00',
                'amount' => '300000.00',
                'installment' => '6875.00',
                'is_approved' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}