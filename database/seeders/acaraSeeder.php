<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class acaraSeeder extends Seeder
{
    public function run(): void
    {
        $adminRole = DB::table('roles')->where('name', 'admin')->first();

        $adminUser = DB::table('users')->where('role_id', $adminRole->id)->first();

        DB::table('acara')->insert([
            'title' => 'Fun Pet Day',
            'description' => 'Acara bermain dan lomba lucu hewan peliharaan',
            'start_date' => now()->addWeek(),
            'end_date' => now()->addWeeks(2),
            'location' => 'Lapangan Hijau PetPark',
            'created_by' => $adminUser->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
