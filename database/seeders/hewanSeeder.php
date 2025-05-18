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
    $ownerId = DB::table('users')->where('role', 'pemilik_hewan')->first()->id;

        DB::table('hewan')->insert([
            'owner_id' => $ownerId,
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
