<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserData;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            $user = new User();
            $user->account_id = 'ID_03222161843847';
            $user->email = 'admin@mail.com';
            $user->remember_token = Str::random(10);
            $user->password = Hash::make('12345678');
            $user->role = 'admin';
            $user->status = 'active';
            $user->save();
    
            UserData::factory()->create([
                'user_id' => $user->id,
                'full_name' => 'Admin Keren',
            ]);
    }
}
