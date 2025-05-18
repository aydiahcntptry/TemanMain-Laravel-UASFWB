<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class pembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orderId = DB::table('pesanan')->first()->order_id;

        DB::table('pembayaran')->insert([
            'order_id' => $orderId,
            'amount' => 75000,
            'payment_status' => 'tertunda',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
