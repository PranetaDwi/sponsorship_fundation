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
        Schema::create('events', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->unsignedInteger('organizer_id')->index('organizer_id');
            $table->foreign('organizer_id')->references('id')->on('organizers')->onDelete('cascade');
            $table->string('title', 100);
            $table->text('description');
            $table->unsignedMediumInteger('target_participants');
            $table->text('participant_description');
            $table->string('status_event', 40);
            $table->string('type_event', 40);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
