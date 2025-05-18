<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class pesananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $petId = DB::table('hewan')->first()->pet_id;
        $serviceId = DB::table('layanan')->where('service_type', 'penitipan')->first()->service_id;

        DB::table('pesanan')->insert([
            'pet_id' => $petId,
            'service_id' => $serviceId,
            'status' => 'tertunda',
            'service_date' => now()->addDays(3),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
