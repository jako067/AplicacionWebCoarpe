<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Group;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class GroupUserSeeder extends Seeder
{
    public function run(): void
    {
        $groups = Group::all();
        $users = User::all();

        foreach ($groups as $group) {
            $randomUsers = $users->random(rand(3, 8));

            foreach ($randomUsers as $user) {
                DB::table('group_user')->insert([
                    'group_id' => $group->id,
                    'user_id' => $user->id,
                ]);
            }
        }
    }
}
