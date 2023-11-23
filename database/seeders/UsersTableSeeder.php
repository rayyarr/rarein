<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Ray',
                'email' => 'rayya@gmail.com',
                'password' => Hash::make('123123123'),
                'role' => 2, // admin
            ],
            [
                'name' => 'Indra',
                'email' => 'indra@gmail.com',
                'password' => Hash::make('123123123'),
                'role' => 1,
            ],
            [
                'name' => 'Rivai',
                'email' => 'rivai@gmail.com',
                'password' => Hash::make('123123123'),
                'role' => 1,
            ],
            // Add more users as needed
        ];

        // Insert data into the users table
        DB::table('users')->insert($users);
    }
}
