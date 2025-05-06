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
        Schema::create('competitions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->nullable()->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
            $table->string('name', 150);
            $table->string('description');
            $table->enum('level', ['Local', 'National', 'International']);
            $table->enum('category', ['Individual', 'Team']);
            $table->date('start_reg_date');
            $table->date('end_reg_date');
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('verification_status', ['On Process', 'Approved', 'Rejected'])->default('On Process');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competitions');
    }
};
