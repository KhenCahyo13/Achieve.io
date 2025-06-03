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
        Schema::create('competition_fields', function (Blueprint $table) {
            $table->foreignUuid('competition_id')->references('id')->on('competitions')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignUuid('field_id')->references('id')->on('fields')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competition_fields');
    }
};
