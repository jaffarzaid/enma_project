<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;


    protected $fillable = [
        'cpr',
        'name',
        'license_code',
        'employment_status',
        'training_code',
        'nationality',
        'issue_date',
        'expiry_date'
    ];

    // Relationship with courses Entity: 
    public function courses(){
        return $this->hasMany(Course::class, 'trainer_id', 'id');
    }

}
