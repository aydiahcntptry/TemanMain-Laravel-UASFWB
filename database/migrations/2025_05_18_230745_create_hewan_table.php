<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('hewan', function (Blueprint $table) {
            $table->id('pet_id');
            $table->unsignedBigInteger('owner_id');
            $table->string('name');
            $table->string('species');
            $table->text('health_history')->nullable();
            $table->string('photo')->nullable();
            $table->text('vaccination')->nullable();
            $table->timestamps(); // created_at, updated_at

            // Foreign key constraint
            $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hewan');
    }
};