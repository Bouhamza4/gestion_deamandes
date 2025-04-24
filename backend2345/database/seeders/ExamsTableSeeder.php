<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Exam;
use App\Models\Course;

class ExamsTableSeeder extends Seeder
{
    public function run()
    {
        foreach (Course::all() as $course) {
            Exam::create([
                'course_id' => $course->id,
                'date' => now()->addDays(rand(1, 15)),
                'salle' => 'Salle ' . rand(1, 5),
                'type' => 'final'
            ]);
        }
    }
}
