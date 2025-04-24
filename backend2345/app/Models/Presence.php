<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Presence extends Model
{
    protected $fillable = ['etudiant_id', 'course_id', 'date', 'status'];

    public function etudiant()
    {
        return $this->belongsTo(User::class, 'etudiant_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
