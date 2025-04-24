<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'titre', 'description', 'professeur', 'date_debut', 'date_fin'
    ];
    public function attendances()
{
    return $this->hasMany(Attendance::class);
}
    public function notes()
{
    return $this->hasMany(Note::class);
}

    public function etudiants()
{
    return $this->belongsToMany(Etudiant::class, 'attendances');

    
}
public function filiere() {
    return $this->belongsTo(Filiere::class);
}
public function presences()
{
    return $this->hasMany(Presence::class);
}

public function exams()
{
    return $this->hasMany(Exam::class);
}

}