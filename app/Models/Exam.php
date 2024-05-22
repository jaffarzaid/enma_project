<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;


    protected $fillable = [
        'student_id', 
        'registered_course_id', 
        'exam_score', 
        'exam_status', 
    ];



    // Inverse Relationship with student Model:
    public function students(){
        return $this->belongsTo(Student::class, 'student_id', 'id');
    } 


    // Inverse Relationship with RegisteredCourses Model: 
    public function registered_courses(){
        return $this->belongsTo(RegisteredCourse::class, 'registered_course_id', 'id');
    }
}
