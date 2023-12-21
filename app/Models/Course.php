<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_name',
        'course_code',
        'course_intro_link',
        'course_link',
        'course_desc',
        'course_duration',
        'learning_objectives',
        'learning_objectives',
        'course_price',
        'admin_id',
        'status'
    ];

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}