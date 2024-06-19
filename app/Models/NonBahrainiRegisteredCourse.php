<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NonBahrainiRegisteredCourse extends Model
{
    use HasFactory;

    protected $fillable = [
        'trainee_id',
        'course_id'
    ];

    //  Inverse Relationship with Trainee Model: 
    public function trainee(){
        return $this->belongsTo(Trainee::class, 'course_id', 'id');
    }

}
