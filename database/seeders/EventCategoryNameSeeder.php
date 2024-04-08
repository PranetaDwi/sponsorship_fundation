<?php

namespace Database\Seeders;

use App\Models\EventCategoryName;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventCategoryNameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EventCategoryName::create(['name' => 'Musik']);
        EventCategoryName::create(['name' => 'Sosialisasi']);
        EventCategoryName::create(['name' => 'Pelayanan Masyarakat']);
        EventCategoryName::create(['name' => 'Humoris']);
        EventCategoryName::create(['name' => 'Ceramah']);
        EventCategoryName::create(['name' => 'Pendidikan']);
    }
}
