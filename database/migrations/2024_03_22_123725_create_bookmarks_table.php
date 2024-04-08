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
        Schema::create('bookmarks', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->unsignedInteger('event_id')->index('event_id')->unique();
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
            $table->unsignedInteger('entrepreneur_id')->index('entrepreneur_id')->unique();
            $table->foreign('entrepreneur_id')->references('id')->on('entrepreneurs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookmarks');
    }
};
