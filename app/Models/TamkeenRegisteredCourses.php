<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TamkeenRegisteredCourses extends Model
{
    use HasFactory;

    protected $fillable = [
        'trainee_id',
        'course_id'
    ];


    // Inverse Relationship with course entity: 
    public function courses()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }

    // Relationship with exams Entity: 
    public function exams()
    {
        return $this->hasMany(Exam::class, 'registered_course_id', 'id');
    }
}