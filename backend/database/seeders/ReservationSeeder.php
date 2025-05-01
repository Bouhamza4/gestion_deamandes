<?php

namespace Database\Seeders;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        foreach ($users as $user) {
            Reservation::create([
                'user_id' => $user->id,
                'type' => fake()->randomElement([
                    "Demande d\'eau", 
                    "Demande d\'électricité", 
                   " Acte de décès", 
                    "Acte de naissance", 
                    'Permis de construire'
                ]),
                'reservation_date' => fake()->dateTimeBetween('now', '+1 month')->format('Y-m-d'),
                'reservation_time' => fake()->time('H:i'),
                'status' => fake()->randomElement(['en_attente', 'accepte', 'refuse', 'reporté']),
                'notes' => fake()->boolean(30) ? fake()->sentence() : null,
            ]);
        }
    }
}

