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
        Schema::create('student_course_material_completions', function (Blueprint $table) {
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('course_material_id');
            $table->index(['student_id', 'course_material_id'],  'student_course_completion_index');
            $table->boolean('is_complete')->default(false);
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');;
            $table->foreign('course_material_id')->references('id')->on('course_materials')->onDelete('cascade');;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_course_material_completions');
    }
};
