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
        // Schema::create('temanmain', function (Blueprint $table) {
        //     $table->id();
        //     $table->timestamps();
        // });

        // Create users table
        Schema::create('user', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('username', 50);
            $table->string('email', 100)->unique();
            $table->string('password', 255);
            $table->enum('role', ['admin', 'pemilik_hewan', 'perawat_hewan']);
            $table->enum('status', ['aktif', 'suspend'])->default('aktif');
            $table->timestamp('created_at')->useCurrent();
        });

        // Create pets table
        Schema::create('pets', function (Blueprint $table) {
            $table->id('pet_id');
            $table->unsignedBigInteger('owner_id');
            $table->string('name', 50);
            $table->string('species', 50);
            $table->text('health_history')->nullable();
            $table->string('photo', 255)->nullable();
            $table->text('vaccination')->nullable();
            $table->timestamp('created_at')->useCurrent();
            
            $table->foreign('owner_id')->references('user_id')->on('user');
        });

        // Create services table
        Schema::create('services', function (Blueprint $table) {
            $table->id('service_id');
            $table->enum('service_type', ['penitipan', 'grooming', 'home_service']);
            $table->decimal('price', 10, 2);
            $table->text('description')->nullable();
            $table->timestamp('created_at')->useCurrent();
        });

        // Create orders table
        Schema::create('orders', function (Blueprint $table) {
            $table->id('order_id');
            $table->unsignedBigInteger('pet_id');
            $table->unsignedBigInteger('service_id');
            $table->enum('status', ['pending', 'in_progress', 'completed'])->default('pending');
            $table->dateTime('service_date');
            $table->timestamp('created_at')->useCurrent();
            
            $table->foreign('pet_id')->references('pet_id')->on('pets');
            $table->foreign('service_id')->references('service_id')->on('services');
        });

        // Create payments table
        Schema::create('payments', function (Blueprint $table) {
            $table->id('payment_id');
            $table->unsignedBigInteger('order_id');
            $table->decimal('amount', 10, 2);
            $table->enum('payment_status', ['pending', 'paid'])->default('pending');
            $table->dateTime('payment_date')->nullable();
            
            $table->foreign('order_id')->references('order_id')->on('orders');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('temanmain');
        Schema::dropIfExists('payments');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('services');
        Schema::dropIfExists('pets');
        Schema::dropIfExists('users');
    }
};
