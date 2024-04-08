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
        Schema::create('event_photos', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->unsignedInteger('event_id')->index('event_id')->unique();
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
            $table->string('photo_file', 191);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_photos');
    }
};
