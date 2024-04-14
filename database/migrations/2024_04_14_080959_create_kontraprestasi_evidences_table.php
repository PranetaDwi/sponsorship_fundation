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
        Schema::create('kontraprestasi_evidences', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->unsignedInteger('sponsor_id')->index('sponsor_id');
            $table->foreign('sponsor_id')->references('id')->on('sponsors')->onDelete('cascade');
            $table->string('photo_file', 191)->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kontraprestasi_evidences');
    }
};
