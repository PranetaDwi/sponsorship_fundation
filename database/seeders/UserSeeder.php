<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\UserData;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->account_id = 'ID_03222161843839';
        $user->email = 'user1@mail.com';
        $user->remember_token = Str::random(10);
        $user->password = Hash::make('00000000');
        $user->role = 'user';
        $user->status = 'active';
        $user->save();

        $userData = UserData::factory()->create([
            'user_id' => $user->id,
            'full_name' => 'user',
        ]);
    }
}
