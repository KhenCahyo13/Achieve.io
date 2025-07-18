<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('rich_texts', function (Blueprint $table) {
            $table->id();
            $table->uuidMorphs('record');
            $table->string('field');
            $table->longText('body')->nullable();
            $table->timestamps();

            $table->unique(['field', 'record_type', 'record_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('rich_texts');
    }
};
