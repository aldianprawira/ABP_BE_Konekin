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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idKreator');
            $table->foreign('idKreator')
                ->references('id')
                ->on('kreators')
                ->onDelete('cascade');
            $table->unsignedBigInteger('idAudiens');
            $table->foreign('idAudiens')
                ->references('id')
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
        Schema::dropIfExists('transaksi');
    }
};
