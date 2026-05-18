<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class MessageUserSeeder extends Seeder
{
    public function run(): void
    {
        $messages = Message::all();
        $users = User::all();

        foreach ($messages as $message) {
            $randomUsers = $users->random(rand(1, 5));

            foreach ($randomUsers as $user) {
                DB::table('message_user')->insert([
                    'message_id' => $message->id,
                    'user_id' => $user->id,
                ]);
            }
        }
    }
}
