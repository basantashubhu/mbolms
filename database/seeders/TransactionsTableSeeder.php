<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TransactionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('transactions')->delete();
        
        \DB::table('transactions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'loan_id' => 1,
                'user_id' => 2,
                'transaction_type' => 'card',
                'status' => 'success',
                'amount' => '30000.00',
                'created_at' => '2022-04-10 04:32:08',
                'updated_at' => '2022-04-10 04:32:08',
            ),
            1 => 
            array (
                'id' => 2,
                'loan_id' => 1,
                'user_id' => 2,
                'transaction_type' => 'card',
                'status' => 'success',
                'amount' => '30000.00',
                'created_at' => '2022-04-10 04:32:11',
                'updated_at' => '2022-04-10 04:32:11',
            ),
            2 => 
            array (
                'id' => 3,
                'loan_id' => 1,
                'user_id' => 2,
                'transaction_type' => 'card',
                'status' => 'success',
                'amount' => '30000.00',
                'created_at' => '2022-04-10 04:32:15',
                'updated_at' => '2022-04-10 04:32:15',
            ),
            3 => 
            array (
                'id' => 4,
                'loan_id' => 1,
                'user_id' => 2,
                'transaction_type' => 'card',
                'status' => 'success',
                'amount' => '30000.00',
                'created_at' => '2022-04-10 04:32:18',
                'updated_at' => '2022-04-10 04:32:18',
            ),
            4 => 
            array (
                'id' => 5,
                'loan_id' => 1,
                'user_id' => 2,
                'transaction_type' => 'card',
                'status' => 'success',
                'amount' => '30000.00',
                'created_at' => '2022-04-10 04:32:21',
                'updated_at' => '2022-04-10 04:32:21',
            ),
            5 => 
            array (
                'id' => 6,
                'loan_id' => 2,
                'user_id' => 3,
                'transaction_type' => 'card',
                'status' => 'success',
                'amount' => '7400.00',
                'created_at' => '2022-04-10 04:32:23',
                'updated_at' => '2022-04-10 04:32:23',
            ),
            6 => 
            array (
                'id' => 7,
                'loan_id' => 2,
                'user_id' => 3,
                'transaction_type' => 'card',
                'status' => 'success',
                'amount' => '7400.00',
                'created_at' => '2022-04-10 04:32:26',
                'updated_at' => '2022-04-10 04:32:26',
            ),
            7 => 
            array (
                'id' => 8,
                'loan_id' => 2,
                'user_id' => 3,
                'transaction_type' => 'card',
                'status' => 'success',
                'amount' => '7400.00',
                'created_at' => '2022-04-10 04:32:28',
                'updated_at' => '2022-04-10 04:32:28',
            ),
            8 => 
            array (
                'id' => 9,
                'loan_id' => 2,
                'user_id' => 3,
                'transaction_type' => 'card',
                'status' => 'success',
                'amount' => '7400.00',
                'created_at' => '2022-04-10 04:32:32',
                'updated_at' => '2022-04-10 04:32:32',
            ),
            9 => 
            array (
                'id' => 10,
                'loan_id' => 2,
                'user_id' => 3,
                'transaction_type' => 'card',
                'status' => 'success',
                'amount' => '7400.00',
                'created_at' => '2022-04-10 04:32:35',
                'updated_at' => '2022-04-10 04:32:35',
            ),
            10 => 
            array (
                'id' => 11,
                'loan_id' => 2,
                'user_id' => 3,
                'transaction_type' => 'card',
                'status' => 'success',
                'amount' => '7400.00',
                'created_at' => '2022-04-10 04:32:38',
                'updated_at' => '2022-04-10 04:32:38',
            ),
            11 => 
            array (
                'id' => 12,
                'loan_id' => 2,
                'user_id' => 3,
                'transaction_type' => 'card',
                'status' => 'success',
                'amount' => '7400.00',
                'created_at' => '2022-04-10 04:32:41',
                'updated_at' => '2022-04-10 04:32:41',
            ),
            12 => 
            array (
                'id' => 13,
                'loan_id' => 2,
                'user_id' => 3,
                'transaction_type' => 'card',
                'status' => 'success',
                'amount' => '7400.00',
                'created_at' => '2022-04-10 04:32:45',
                'updated_at' => '2022-04-10 04:32:45',
            ),
            13 => 
            array (
                'id' => 14,
                'loan_id' => 2,
                'user_id' => 3,
                'transaction_type' => 'card',
                'status' => 'success',
                'amount' => '7400.00',
                'created_at' => '2022-04-10 04:32:48',
                'updated_at' => '2022-04-10 04:32:48',
            ),
            14 => 
            array (
                'id' => 15,
                'loan_id' => 2,
                'user_id' => 3,
                'transaction_type' => 'card',
                'status' => 'success',
                'amount' => '7400.00',
                'created_at' => '2022-04-10 04:32:52',
                'updated_at' => '2022-04-10 04:32:52',
            ),
            15 => 
            array (
                'id' => 16,
                'loan_id' => 2,
                'user_id' => 3,
                'transaction_type' => 'card',
                'status' => 'success',
                'amount' => '7400.00',
                'created_at' => '2022-04-10 04:32:56',
                'updated_at' => '2022-04-10 04:32:56',
            ),
            16 => 
            array (
                'id' => 17,
                'loan_id' => 2,
                'user_id' => 3,
                'transaction_type' => 'card',
                'status' => 'success',
                'amount' => '7400.00',
                'created_at' => '2022-04-10 04:33:06',
                'updated_at' => '2022-04-10 04:33:06',
            ),
            17 => 
            array (
                'id' => 18,
                'loan_id' => 1,
                'user_id' => 2,
                'transaction_type' => 'card',
                'status' => 'success',
                'amount' => '30000.00',
                'created_at' => '2022-04-10 04:33:10',
                'updated_at' => '2022-04-10 04:33:10',
            ),
            18 => 
            array (
                'id' => 19,
                'loan_id' => 1,
                'user_id' => 2,
                'transaction_type' => 'card',
                'status' => 'success',
                'amount' => '30000.00',
                'created_at' => '2022-04-10 04:33:13',
                'updated_at' => '2022-04-10 04:33:13',
            ),
        ));
        
        
    }
}