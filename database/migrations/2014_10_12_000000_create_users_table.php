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
        Schema::create('users', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('account_id', 18)->unique();
            $table->string('email', 254)->unique();
            $table->string('remember_token', 191)->unique()->nullable();
            $table->string('password', 191)->unique();
            $table->time('email_verified_at')->nullable();
            $table->string('role', 20);
            $table->string('status', 15);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
