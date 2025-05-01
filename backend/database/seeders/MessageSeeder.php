<?php

// database/seeders/MessageSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Message;
use App\Models\User;

class MessageSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();

        foreach ($users as $user) {
            Message::factory()->count(5)->create([
                'user_id' => $user->id,
            ]);
        }
    }
}
