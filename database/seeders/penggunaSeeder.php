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
         $adminRoleId = DB::table('roles')->where('name', 'admin')->value('id');
        $pemilikRoleId = DB::table('roles')->where('name', 'pemilik_hewan')->value('id');
        $perawatRoleId = DB::table('roles')->where('name', 'perawat_hewan')->value('id');

        DB::table('users')->insert([
            [
                'username' => 'ayudiah',
                'email' => 'ayudiah@mail.com',
                'password' => Hash::make('password'),
                'role_id' => $adminRoleId,
            ],
            [
                'username' => 'cinta',
                'email' => 'cinta@mail.com',
                'password' => Hash::make('password'),
                'role_id' => $pemilikRoleId,
            ],
            [
                'username' => 'putry',
                'email' => 'putry@mail.com',
                'password' => Hash::make('password'),
                'role_id' => $perawatRoleId,
            ]
        ]);
    }
}
