<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        
        \DB::table('users')->insert(array (
            1 => 
            array (
                'id' => 2,
                'name' => 'Rosetta Reyes',
                'email' => 'mowigata@example.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$/CVKysFwqPywvixo/Ivz5eO2/GYfSv6pqL5uszWmQRad3dHqlWO7a',
                'is_admin' => 0,
                'is_active' => 1,
                'address' => '557 Pagne Path',
                'phone' => '9802468584',
                'sex' => 'male',
                'dob' => '1993-06-15',
                'remember_token' => NULL,
                'created_at' => '2022-04-10 04:28:07',
                'updated_at' => '2022-04-10 04:30:53',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Mable Williams',
                'email' => 've@host.test',
                'email_verified_at' => NULL,
                'password' => '$2y$10$.SkfRzT/RRx76nTcip6BUuhtQ3F5LhS5XcyXV8C3IrJ7yMmakRn.a',
                'is_admin' => 0,
                'is_active' => 1,
                'address' => '1765 Zupfaf Pass',
                'phone' => '8233834496',
                'sex' => 'female',
                'dob' => '1983-06-07',
                'remember_token' => NULL,
                'created_at' => '2022-04-10 04:28:57',
                'updated_at' => '2022-04-10 04:30:47',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Mary Phelps',
                'email' => 'bez@host.invalid',
                'email_verified_at' => NULL,
                'password' => '$2y$10$60HEAPs75z5h91C/0QaVEOlHJDnzIJAaMihX7LGLLeH2l5zIcJFqq',
                'is_admin' => 0,
                'is_active' => 0,
                'address' => '349 Figup Drive',
                'phone' => '3692805839',
                'sex' => 'male',
                'dob' => '1967-10-17',
                'remember_token' => NULL,
                'created_at' => '2022-04-10 04:29:38',
                'updated_at' => '2022-04-10 04:29:38',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Marcus Fowler',
                'email' => 'atfidro@host.local',
                'email_verified_at' => NULL,
                'password' => '$2y$10$xXtJrX51zjj1se8om5wqpuxdMnAP.IrloZry9wQe3REMt9GCLQhLG',
                'is_admin' => 0,
                'is_active' => 1,
                'address' => '932 Tulup Trail',
                'phone' => '3034911771',
                'sex' => 'female',
                'dob' => '1997-06-17',
                'remember_token' => NULL,
                'created_at' => '2022-04-10 04:30:14',
                'updated_at' => '2022-04-10 04:30:40',
            ),
        ));
        
        
    }
}