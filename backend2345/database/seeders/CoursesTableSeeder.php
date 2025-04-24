<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CoursesTableSeeder extends Seeder
{
    public function run()
    {
        Course::insert([
            ['titre' => 'Mathématiques', 'description' => 'Algèbre & analyse', 'date_debut' => now(), 'date_fin' => now()->addMonths(4)],
            ['titre' => 'Informatique', 'description' => 'Programmation et réseaux', 'date_debut' => now(), 'date_fin' => now()->addMonths(4)],
        ]);
    }
}
