<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\UserData;

class EntrepreneurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->account_id = 'ID_03222161843839';
        $user->email = 'entrepreneur@mail.com';
        $user->remember_token = Str::random(10);
        $user->password = Hash::make('12345678');
        $user->role = 'entrepreneur';
        $user->status = 'active';
        $user->save();

        UserData::factory()->create([
            'user_id' => $user->id,
            'full_name' => 'entrepreneur user',
        ]);
    }
}
