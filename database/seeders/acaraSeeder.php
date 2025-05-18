<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class acaraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminId = DB::table('users')->where('role', 'admin')->first()->id;

        DB::table('acara')->insert([
            'title' => 'Fun Pet Day',
            'description' => 'Acara bermain dan lomba lucu hewan peliharaan',
            'start_date' => now()->addWeek(),
            'end_date' => now()->addWeeks(2),
            'location' => 'Lapangan Hijau PetPark',
            'created_by' => $adminId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
