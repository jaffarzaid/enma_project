<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PreparatoryRegisteredCourses;
use App\Models\TamkeenRegisteredCourses;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'trainer_id',
        'awarding_body',
        'course_code',
        'course_name',
        'license_code',
        'num_of_hours',
        'level',
        'issue_date',
        'expiry_date',
        'entered_by',
        'edited_by',
    ];

    // Inverse Relationship with trainers Entity: 
    public function trainers()
    {
        return $this->belongsTo(Trainee::class, 'trainer_id', 'id');
    }

    // Relationship with preparatory_registered_courses entity: 
    public function preparatory_registered_courses()
    {
        return $this->hasMany(PreparatoryRegisteredCourses::class, 'course_id', 'id');
    }

    // Relationship with tamkeen_registered_courses entity: 
    public function tamkeen_registered_courses()
    {
        return $this->hasMany(TamkeenRegisteredCourses::class, 'course_id', 'id');
    }

}
