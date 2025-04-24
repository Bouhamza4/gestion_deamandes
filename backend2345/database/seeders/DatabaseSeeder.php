<?php


namespace Database\Seeders;

use Database\Seeders\CoursesTableSeeder;
use Database\Seeders\ExamsTableSeeder;
use Database\Seeders\PresencesTableSeeder;
use Database\Seeders\UsersTableSeeder;
use Database\Seeders\UsersWithNotesSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // UsersTableSeeder::class,
            // CoursesTableSeeder::class,
            // PresencesTableSeeder::class,
            // ExamsTableSeeder::class,
            // NoteSeeder::class,
            // UsersWithNotesSeeder::class,
        ]);
    }
}
