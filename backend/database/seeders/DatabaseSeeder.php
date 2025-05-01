<?php

namespace Database\Seeders;
use Database\Seeders\MessageSeeder;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(
            [
                // UserSeeder::class, // يكون سبق عملناه
                MessageSeeder::class, // يكون سبق عملناه
                ReservationSeeder::class, // Add this line to call the MessageSeeder
            ]
        );
    }
}
