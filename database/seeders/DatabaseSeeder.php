<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminUserSeeder::class);
        $this->call(LoansTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(UserLoansTableSeeder::class);
        $this->call(ConfirmedLoansTableSeeder::class);
        $this->call(TransactionsTableSeeder::class);
    }
}
