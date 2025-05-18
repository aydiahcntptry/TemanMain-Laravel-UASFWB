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
        $ownerId = DB::table('users')->where('role', 'pemilik_hewan')->first()->id;
        $eventId = DB::table('acara')->first()->event_id;

        DB::table('acaraPengguna')->insert([
            'user_id' => $ownerId,
            'event_id' => $eventId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
