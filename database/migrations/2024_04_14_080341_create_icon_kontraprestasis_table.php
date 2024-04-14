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
        Schema::create('icon_kontraprestasis', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->unsignedInteger('kontraprestasi_id')->index('kontraprestasi_id');
            $table->foreign('kontraprestasi_id')->references('id')->on('kontraprestasis')->onDelete('cascade');
            $table->unsignedInteger('icon_photo_kontraprestasi_id')->index('icon_photo_kontraprestasi_id');
            $table->foreign('icon_photo_kontraprestasi_id')->references('id')->on('icon_photo_kontraprestasis')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('icon_kontraprestasis');
    }
};
