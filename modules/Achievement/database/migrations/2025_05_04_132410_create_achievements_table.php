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
        Schema::create('achievements', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('student_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignUuid('competition_id')->nullable()->references('id')->on('competitions')->onDelete('set null')->onUpdate('set null');
            $table->foreignUuid('lecturer_id')->nullable()->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
            $table->foreignUuid('period_id')->nullable()->references('id')->on('periods')->onDelete('set null')->onUpdate('set null');
            $table->string('title', 150);
            $table->string('description');
            $table->enum('verification_status', ['Proses', 'Disetujui', 'Ditolak']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('achievements');
    }
};
