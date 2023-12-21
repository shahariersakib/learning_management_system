<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Routine extends Model
{
    use HasFactory;

    protected $fillable = ['course_id', 'day', 'start_time', 'end_time'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}