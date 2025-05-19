<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class acarapenggunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Ambil ID role 'pemilik_hewan'
        $pemilikRoleId = DB::table('roles')->where('name', 'pemilik_hewan')->value('id');

        // Cari user dengan role_id sesuai
        $ownerId = DB::table('users')->where('role_id', $pemilikRoleId)->first()->id;

        // Ambil event_id dari table acara
        $eventId = DB::table('acara')->first()->event_id;

        DB::table('acaraPengguna')->insert([
            'user_id' => $ownerId,
            'event_id' => $eventId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
