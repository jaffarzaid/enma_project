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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('registered_courses_id');
            $table->unsignedBigInteger('trainer_id');
            $table->foreign('registered_courses_id')->references('id')->on('registered_courses')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('trainer_id')->references('id')->on('trainers')->onDelete('cascade')->onUpdate('cascade');
            $table->string('awarding_body');
            $table->string('course_code');
            $table->string('course_name');
            $table->string('license_code');
            $table->integer('num_of_hours');
            $table->string('level');
            $table->date('issue_date');
            $table->date('expiry_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
