<?php

namespace App\Repository\Umkm;

use App\Models\Umkm;

class UmkmRepositoryImpl implements UmkmRepository
{
    public function save($data)
    {
        return Umkm::create($data);
    }

    public function findAll()
    {
        return Umkm::all();
    }

    public function findById($id)
    {
        return Umkm::findOrFail($id);
    }
}