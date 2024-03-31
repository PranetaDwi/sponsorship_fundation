<?php

namespace Database\Seeders;

use App\Models\PartisipantCategoryName;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParticipantCategoryNameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PartisipantCategoryName::create(['name' => 'Mahasiswa']);
        PartisipantCategoryName::create(['name' => 'Umum']);
        PartisipantCategoryName::create(['name' => 'Masyarakat']);
        PartisipantCategoryName::create(['name' => 'Pelajar']);
        PartisipantCategoryName::create(['name' => 'Pekerja']);
    }
}
