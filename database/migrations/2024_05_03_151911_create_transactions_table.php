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
        Schema::create('transactions', function (Blueprint $table) {
            $table->string('idTransaction', 50)->primary();
            $table->string('idKreator', 50);
            $table->foreign('idKreator')
                ->references('idKreator')
                ->on('kreators')
                ->onDelete('cascade');
            $table->string('idAudiens', 50);
            $table->foreign('idAudiens')
                ->references('idAudiens')
                ->on('audiens')
                ->onDelete('cascade');
            $table->string('videoTitle', 128);
            $table->string('videoPrice', 50);
            $table->date('tglTransaksi');
            $table->boolean('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
