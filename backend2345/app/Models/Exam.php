<?php
// app/Models/Exam.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $fillable = ['course_id', 'date', 'salle', 'type'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
