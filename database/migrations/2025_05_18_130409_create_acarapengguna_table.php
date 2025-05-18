<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
            Schema::create('acarapengguna', function (Blueprint $table) {
        $table->unsignedBigInteger('user_id');
        $table->unsignedBigInteger('event_id');

        $table->timestamps();
        // Foreign key
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('event_id')->references('event_id')->on('acara')->onDelete('cascade');

        // Composite Primary Key
        $table->primary(['user_id', 'event_id']);
    });
    }

    public function down(): void
    {
        Schema::dropIfExists('acarapengguna');
    }
};
