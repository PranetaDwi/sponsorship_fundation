<?php

namespace App\Repository\IconPhotoKontraprestasi;

use App\Models\IconPhotoKontraprestasi;

class IconPhotoKontraprestasiRepositoryImpl implements IconPhotoKontraprestasiRepository
{
    public function findAll()
    {
        return IconPhotoKontraprestasi::all();
    }

    public function save($data)
    {
        return IconPhotoKontraprestasi::create($data);
    }
}