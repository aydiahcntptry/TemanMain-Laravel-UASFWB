<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id('payment_id');
             $table->unsignedBigInteger('order_id');
            $table->decimal('amount', 15, 2);
            $table->enum('payment_status', ['tertunda', 'dibayar'])->default('tertunda');
            $table->timestamps();

            $table->foreign('order_id')->references('order_id')->on('pesanan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};
