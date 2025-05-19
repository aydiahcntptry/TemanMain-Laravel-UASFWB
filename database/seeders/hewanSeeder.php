<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class hewanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     // Ambil role 'pemilik_hewan' dari tabel roles
        $role = DB::table('roles')->where('name', 'pemilik_hewan')->first();

        // Ambil satu user yang punya role_id sesuai dengan role 'pemilik_hewan'
        $owner = DB::table('users')->where('role_id', $role->id)->first();

        // Masukkan data ke tabel hewan
        DB::table('hewan')->insert([
            'owner_id' => $owner->id,
            'name' => 'Kitty',
            'species' => 'Kucing Persia',
            'health_history' => 'Pernah flu ringan',
            'photo' => null,
            'vaccination' => 'Rabies, Parvo',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}