<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = [
        'etudiant_id', 'course_id', 'note', 'semestre'
    ];

    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

}
