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
        Schema::create('trainings_materials', function (Blueprint $table) {
            $table->id();
            $table->integer('training_id');
            $table->integer('teacher_id');
            $table->string('title');
            $table->string('video');
            $table->boolean('is_free_preview')->default(0);
            $table->string('thumbnail_image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainings_materials');
    }
};