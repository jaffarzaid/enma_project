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
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trainee_id');
            $table->unsignedBigInteger('tamkeen_registered_courses_id');
            $table->unsignedBigInteger('preparatory_registered_courses_id');
            $table->unsignedBigInteger('non_bahraini_registered_course_id');
            $table->foreign('trainee_id')->references('id')->on('trainees')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('tamkeen_registered_courses_id')->references('id')->on('tamkeen_registered_courses')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('preparatory_registered_courses_id')->references('id')->on('preparatory_registered_courses')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('non_bahraini_registered_course_id')->references('id')->on('non_bahraini_registered_courses')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('exam_score')->nullable();
            $table->string('exam_type')->nullable();
            $table->string('exam_status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exams');
    }
};
