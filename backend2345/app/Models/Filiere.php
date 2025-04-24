<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    public function courses() {
        return $this->hasMany(Course::class);
    }
    
    public function etudiants() {
        return $this->hasMany(Etudiant::class);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function getFilieresWithCourses()
    {
        return $this->with('courses')->get();
    }
    public function getFilieresWithEtudiants()
    {
        return $this->with('etudiants')->get();
    }
    public function getFilieresWithCoursesAndEtudiants()
    {
        return $this->with(['courses', 'etudiants'])->get();
    }
    public function getFilieresWithCoursesAndEtudiantsById($id)
    {
        return $this->with(['courses', 'etudiants'])->find($id);
    }
    public function getFilieresWithCoursesAndEtudiantsBySlug($slug)
    {
        return $this->with(['courses', 'etudiants'])->where('slug', $slug)->first();
    }
    public function getFilieresWithCoursesAndEtudiantsBySlugOrId($slugOrId)
    {
        return $this->with(['courses', 'etudiants'])->where('slug', $slugOrId)->orWhere('id', $slugOrId)->first();
    }
    public function getFilieresWithCoursesAndEtudiantsBySlugOrIdOrName($slugOrIdOrName)
    {
        return $this->with(['courses', 'etudiants'])->where('slug', $slugOrIdOrName)->orWhere('id', $slugOrIdOrName)->orWhere('nom', $slugOrIdOrName)->first();
    }
    public function getFilieresWithCoursesAndEtudiantsBySlugOrIdOrNameOrDescription($slugOrIdOrNameOrDescription)
    {
        return $this->with(['courses', 'etudiants'])->where('slug', $slugOrIdOrNameOrDescription)->orWhere('id', $slugOrIdOrNameOrDescription)->orWhere('nom', $slugOrIdOrNameOrDescription)->orWhere('description', $slugOrIdOrNameOrDescription)->first();
    }    
}
