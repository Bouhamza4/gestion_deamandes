<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// use Illuminate\Database\Seeder;
use App\Models\Note;
use App\Models\Etudiant;
use App\Models\Course;
class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   
    
   
        public function run()
        {
            $etudiants = Etudiant::all();
            $courses = Course::all();
    
            foreach ($etudiants as $etudiant) {
                foreach ($courses->random(3) as $course) {
                    Note::create([
                        'etudiant_id' => $etudiant->id,
                        'course_id' => $course->id,
                        'note' => rand(5, 20),
                        'semestre' => 'S1',
                    ]);
                }
            }
        }
    }
    

