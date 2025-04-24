<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    public function etudiant()
{
    return $this->belongsTo(Etudiant::class);
}

public function course()
{
    return $this->belongsTo(Course::class);
}

}
