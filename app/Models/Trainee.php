<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainee extends Model
{
    use HasFactory;

    // Make Data Protected:
    protected $fillable = [
        'f_name', 
        's_name', 
        'l_name', 
        'gender', 
        'cpr', 
        'nationality', 
        'phone1', 
        'phone2', 
        'birthday', 
        'address', 
        'email', 
        'emergency_name', 
        'emergency_relationship', 
        'emergency_phone', 
        'cpr_file', 
        'passport_file', 
        'qualification', 
        'specialization', 
        'gpa', 
        'instruction_language', 
        'education_certificate_file', 
        'transcript_file', 
        'pro_certificate_name', 
        'pro_certificate_specialization', 
        'pro_awarding_body', 
        'pro_year', 
        'job_title', 
        'job_nature', 
        'employer', 
        'num_of_experience', 
        'health_injury_disability', 
        'request_help', 
        'health_issue_file', 
        'sponsorship_name', 
        'declaration', 
        'signature', 
        'english_assessment_date', 
        'english_assessment_time', 
        'english_assessment_score', 
        'english_assessment_decision', 
        'english_assessment_examiner', 
        'pre_assessment_exam_date', 
        'pre_assessment_exam_time', 
        'pre_assessment_exam_score', 
        'pre_assessment_exam_decision', 
        'pre_assessment_entered_by', 
        'counselling_by', 
        'counselling_date', 
        'admission_approved', 
        'studying_status',
        'name_studying_course',
        'studying_finishing_course_date'
    ];

    // Relationship with registered_courses Entity: 
    // public function registered_courses(){
    //     return $this->hasMany(RegisteredCourse::class, 'trainee_id', 'id');
    // }

    // Relationship with preparatory_registered_courses Entity: 
    public function preparatory_registered_courses(){
        return $this->hasMany(PreparatoryRegisteredCourses::class, 'trainee_id', 'id');
    }

    // Relationship with tamkeen_registered_courses Entity: 
    public function tamkeen_registered_courses(){
        return $this->hasMany(TamkeenRegisteredCourses::class, 'trainee_id', 'id');
    }

    // Relationship with exams Entity: 
    public function exams(){
        return $this->hasMany(Exam::class, 'trainee_id', 'id');
    }

    // Relationship with NonBahrainiRegisteredCourse Model: 
    public function nonBahRegisteredCourses(){
        return $this->hasMany(NonBahrainiRegisteredCourse::class, 'trainee_id', 'id');
    }

}
