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
        Schema::create('challenges', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->integer('challenge_categories_id');
            $table->string('message');
            $table->string('flag');
            $table->string('file')->nullable();

            //Transaction
            $table->integer('value');
            $table->integer('solver');
            $table->boolean('challenge_type')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('challenges');
    }
};
