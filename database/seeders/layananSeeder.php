<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class layananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('layanan')->insert([
            [
                'service_type' => 'perawatan',
                'price' => 75000,
                'description' => 'perawatan lengkap dengan pewangi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'service_type' => 'penitipan',
                'price' => 50000,
                'description' => 'Penitipan hewan per hari',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
