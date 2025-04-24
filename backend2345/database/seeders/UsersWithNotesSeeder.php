<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Note;
use App\Models\Course;
use Illuminate\Support\Facades\Hash;

class UsersWithNotesSeeder extends Seeder
{
    public function run(): void
    {
        // IDs des cours disponibles
        $courses = Course::pluck('id')->toArray();

        for ($i = 1; $i <= 10; $i++) {
            $user = User::create([
                'name' => fake()->firstName . ' ' . fake()->lastName,
                'email' => "student{$i}@example.com",
                'password' => Hash::make('Student123!'),
                'role' => 'student'
            ]);

            // Ajouter 3 notes aléatoires à cet étudiant
            shuffle($courses);
            foreach (array_slice($courses, 0, 3) as $course_id) {
                Note::create([
                    'etudiant_id' => $user->etudiant->id, // depuis la relation
                    'course_id'   => $course_id,
                    'note'        => round(mt_rand(80, 195) / 10, 2), // note entre 8.0 et 19.5
                    'semestre'    => rand(0, 1) ? 'S1' : 'S2'
                ]);
            }
        }
    }
}
