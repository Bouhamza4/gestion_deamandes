<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Presence;
use App\Models\User;
use App\Models\Course;

class PresencesTableSeeder extends Seeder
{
    public function run()
    {
        $students = User::where('role', 'student')->pluck('id');
        $courses = Course::pluck('id');

        foreach ($students as $student) {
            foreach ($courses as $course) {
                Presence::create([
                    'etudiant_id' => $student,
                    'course_id' => $course,
                    'date' => now(),
                    'status' => rand(0, 1) ? 'present' : 'absent',
                ]);
            }
        }
    }
}
