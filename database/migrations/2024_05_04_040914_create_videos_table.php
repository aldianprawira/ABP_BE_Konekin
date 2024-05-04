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
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idKreator');
            $table->foreign('idKreator')    
                ->references('id')
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
        Schema::dropIfExists('videos');
    }
};
