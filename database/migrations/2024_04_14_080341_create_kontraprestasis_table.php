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
        Schema::create('kontraprestasis', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->unsignedInteger('event_id')->index('event_id');
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
            $table->unsignedInteger('icon_photo_kontraprestasi_id')->index('icon_photo_kontraprestasi_id');
            $table->foreign('icon_photo_kontraprestasi_id')->references('id')->on('icon_photo_kontraprestasis')->onDelete('cascade');
            $table->string('title', 100);
            $table->unsignedBigInteger('min_sponsor');
            $table->unsignedBigInteger('max_sponsor');
            $table->text('feedback');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kontraprestasis');
    }
};
