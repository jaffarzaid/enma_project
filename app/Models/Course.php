<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'expiry_date'
    ];


    // Inverse Relationship with trainers Entity: 
    public function trainers(){
        return $this->belongsTo(Trainer::class, 'trainer_id', 'id');
    }


    // Relationship with registered_courses entity: 
    public function registered_courses(){
        return $this->hasMany(RegisteredCourse::class, 'course_id', 'id');
    }


    
}
