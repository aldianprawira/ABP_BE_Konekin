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
        Schema::create('audiens', function (Blueprint $table) {
            $table->id();
            // $table->string('idAudiens',50)->primary();
            $table->string('username', 50)->nullable();
            $table->string('noHP', 50)->nullable();
            $table->string('email', 50)->nullable();
            $table->binary('profilePict')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('audiens');
    }
};
