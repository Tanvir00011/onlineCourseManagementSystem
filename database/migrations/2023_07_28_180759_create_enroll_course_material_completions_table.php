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
        Schema::create('enroll_course_material_completions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('enroll_id');
            $table->unsignedBigInteger('course_material_id');
            $table->boolean('is_complete')->default(false);
            $table->foreign('enroll_id')->references('id')->on('enrolls')->onDelete('cascade');;
            $table->foreign('course_material_id')->references('id')->on('course_materials')->onDelete('cascade');;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enroll_course_material_completions');
    }
};
