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
        Schema::create('participant_categories', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->unsignedInteger('event_id')->index('event_id');
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
            $table->unsignedInteger('participant_category_name_id')->index('parcisipant_category_name_id');
            $table->foreign('participant_category_name_id')->references('id')->on('participant_category_names')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participant_categories');
    }
};
