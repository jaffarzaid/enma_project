<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NonBahrainiRegisteredCourse extends Model
{
    use HasFactory;

    protected $fillable = [
        'trainee_id',
        'course_id',
        'trainee_type',
        'training_service',
        'program_sponsorship',
        'declaration',
    ];

    //  Inverse Relationship with Trainee Model: 
    public function trainee(){
        return $this->belongsTo(Trainee::class, 'course_id', 'id');
    }

    // Inverse Relationship with Course Model: 
    public function courses(){
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }

    // Relationship with Exams model:
    public function exam(){
        return $this->hasMany(Exam::class, 'non_bahraini_registered_course_id', 'id');
    } 
}
