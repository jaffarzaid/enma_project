<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;


    protected $fillable = [

    ];



    // Relationship with registered_courses Entity:
    public function registered_courses(){
        return $this->hasMany(RegisteredCourse::class, 'exam_id', 'id');
    } 
}
