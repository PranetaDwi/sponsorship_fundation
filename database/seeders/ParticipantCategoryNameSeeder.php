<?php

namespace Database\Seeders;

use App\Models\ParticipantCategoryName;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParticipantCategoryNameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ParticipantCategoryName::create(['name' => 'Mahasiswa']);
        ParticipantCategoryName::create(['name' => 'Umum']);
        ParticipantCategoryName::create(['name' => 'Masyarakat']);
        ParticipantCategoryName::create(['name' => 'Pelajar']);
        ParticipantCategoryName::create(['name' => 'Pekerja']);
    }
}
