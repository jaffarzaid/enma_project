<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisteredCourse extends Model
{
    use HasFactory;

    protected $fillabled = [
        'student_id', 
        'course_id'
    ];


    // Inverse Relationship with students Model: 
    public function students(){
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }



    // Inverse Relationship with course entity: 
    public function courses(){
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }


    // Relationship with exams Entity: 
    public function exams(){
        return $this->hasMany(Exam::class, 'registered_course_id', 'id');
    }
}
