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
        Schema::create('video', function (Blueprint $table) {
            $table->string('idVideo',50)->primary();
            $table->string('idKreator', 50);
            $table->foreign('idKreator')    
                ->references('idKreator')
                ->on('kreators')
                ->onDelete('cascade');
            $table->string('videoTitle', 128);
            $table->string('videoDescription', 500);
            $table->string('videoDuration', 50);
            $table->string('videoPrice', 50);
            $table->string('video', 128);
            $table->binary('videoThumbnail');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('video');
    }
};
