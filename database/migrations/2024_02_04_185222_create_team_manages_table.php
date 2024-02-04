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
        Schema::create('team_manages', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('information_id')->references('id')->on('informations');
            $table->foreignUuid('team_id')->references('id')->on('teams');
            $table->foreignUuid('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('team_manages');
    }
};
