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

        DB::table('users')->updateOrInsert(
            ['email' => 'ayudiah@mail.com'],
            [
                'username' => 'ayudiah',
                'password' => Hash::make('password123'),
                'role_id' => $adminRoleId,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        DB::table('users')->updateOrInsert(
            ['email' => 'cinta@mail.com'],
            [
                'username' => 'cinta',
                'password' => Hash::make('password123'),
                'role_id' => $pemilikRoleId,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        DB::table('users')->updateOrInsert(
            ['email' => 'putry@mail.com'],
            [
                'username' => 'putry',
                'password' => Hash::make('password123'),
                'role_id' => $perawatRoleId,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}