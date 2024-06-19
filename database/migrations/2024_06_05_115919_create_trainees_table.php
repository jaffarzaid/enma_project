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
        Schema::create('trainees', function (Blueprint $table) {
            $table->id();
            $table->string('f_name');
            $table->string('s_name');
            $table->string('l_name');
            $table->string('gender');
            $table->bigInteger('cpr')->unique();
            $table->string('nationality');
            $table->string('phone1');
            $table->string('phone2');
            $table->date('birthday');
            $table->text('address');
            $table->string('email')->unique();
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
            $table->string('pro_certificate_name')->nullable();
            $table->string('pro_certificate_specialization')->nullable();
            $table->string('pro_awarding_body')->nullable();
            $table->integer('pro_year')->nullable();
            $table->string('job_title')->nullable();
            $table->string('job_nature')->nullable();
            $table->string('employer')->nullable();
            $table->integer('num_of_experience')->nullable();
            $table->integer('health_injury_disability');
            $table->integer('request_help');
            $table->string('health_issue_file');
            $table->string('pm_of_interest');
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
            $table->string('registration_status');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainees');
    }
};
