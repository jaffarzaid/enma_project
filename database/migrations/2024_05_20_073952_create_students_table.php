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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('f_name')->nullable();
            $table->string('s_name')->nullable();
            $table->string('l_name')->nullable();
            $table->string('gender')->nullable();
            $table->integer('cpr')->nullable()->unique();
            $table->string('nationality')->nullable();
            $table->integer('phone1')->nullable();
            $table->integer('phone2')->nullable();
            $table->date('birthday')->nullable();
            $table->text('address');
            $table->string('email')->nullable();
            $table->string('emergency_name');
            $table->string('emergency_relationship');
            $table->integer('emergency_phone');
            $table->string('cpr_file');
            $table->string('passport_file');
            $table->string('qualification');
            $table->string('specialization');
            $table->double('gpa');
            $table->string('instruction_language');
            $table->string('education_certificate_file');
            $table->string('transcript_file');
            $table->string('pro_certificate_name');
            $table->string('pro_certificate_specialization');
            $table->string('pro_awarding_body');
            $table->integer('pro_year');
            $table->string('job_title');
            $table->string('job_nature');
            $table->string('employer');
            $table->integer('num_of_experience');
            $table->integer('health_injury_disability');
            $table->integer('request_help');
            $table->string('health_issue_file');
            $table->string('sponsorship_name');
            $table->text('declaration')->nullable();
            $table->string('signature')->nullable();
            $table->date('english_assessment_date');
            $table->time('english_assessment_time');
            $table->double('english_assessment_score');
            $table->string('english_assessment_decision');
            $table->string('english_assessment_examiner');
            $table->date('pre_assessment_exam_date');
            $table->time('pre_assessment_exam_time');
            $table->integer('pre_assessment_exam_score');
            $table->string('pre_assessment_exam_decision');
            $table->string('pre_assessment_entered_by');
            $table->string('counselling_by');
            $table->date('counselling_date');
            $table->string('admission_approved');
            $table->string('studying_status');
            $table->string('name_studying_course');
            $table->date('studying_finishing_course_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
