<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id('order_id');
            $table->unsignedBigInteger('pet_id');
            $table->unsignedBigInteger('service_id');
            $table->enum('status', ['tertunda', 'dalam_Proses', 'selesai'])->default('tertunda');
            $table->dateTime('service_date');
            $table->timestamps(); // created_at & updated_at

            // Foreign key constraints
            $table->foreign('pet_id')->references('pet_id')->on('hewan')->onDelete('cascade');
            $table->foreign('service_id')->references('service_id')->on('layanan')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};