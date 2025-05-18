<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class penggunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'username' => 'ayudiah',
                'email' => 'ayudiah@mail.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'cinta',
                'email' => 'cinta@mail.com',
                'password' => Hash::make('password'),
                'role' => 'pemilik_hewan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'putry',
                'email' => 'putry@mail.com',
                'password' => Hash::make('password'),
                'role' => 'perawat_hewan',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
