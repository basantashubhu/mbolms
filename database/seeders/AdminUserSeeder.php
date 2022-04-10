<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{

    public function run()
    {
        User::query()->firstOrCreate([
            'email' => 'admin@mbolms.com'
        ], [
            'name' => 'Admin User',
            'password' => bcrypt('admin123'),
            'is_admin' => true,
            'is_active' => true
        ]);
    }
}
