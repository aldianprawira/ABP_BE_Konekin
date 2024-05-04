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
        Schema::create('kreators', function (Blueprint $table) {
            $table->id();
            // $table->string('idKreator',50)->primary();
            $table->string('username', 50);
            $table->string('noHP', 50);
            $table->string('email', 50);
            $table->binary('cv');
            $table->string('bio', 128);
            $table->string('socMed', 128);
            $table->string('rekening', 50);
            $table->binary('profilePict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kreators');
    }
};
