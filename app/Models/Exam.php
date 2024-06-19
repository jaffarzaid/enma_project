<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    // Make data protected: 
    protected $fillable = [
        'trainee_id',
        'tamkeen_registered_courses_id',
        'preparatory_registered_courses_id',
        'non_bahraini_registered_id',
    ];

    // Inverse relationship with Trainee model: 
    public function trainees(){
        return $this->belongsTo(Trainee::class, 'trainee_id', 'id');
    }

    // Inverse relationship with TamkeenRegisteredCourses Model: 
    public function tamkeenRegisteredCourses(){
        return $this->belongsTo(TamkeenRegisteredCourses::class, 'tamkeen_registered_courses_id', 'id');
    }

    // Inverse relationship with PreparatoryRegisteredCourses Model: 
    public function preparatoryRegisterdModel(){
        return $this->belongsTo(PreparatoryRegisteredCourses::class, 'preparatory_registered_courses_id', 'id');
    }

    // Inverse relationship with NonBahrainiRegisteredCourse Model: 
    public function nonBahrainiRegisteredCourses(){
        return $this->belongsTo(NonBahrainiRegisteredCourse::class, 'non_bahraini_registered_id', 'id');
    }
}
