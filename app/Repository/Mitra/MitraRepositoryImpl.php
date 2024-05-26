<?php

namespace App\Repository\Mitra;

use App\Models\Mitra;

class MitraRepositoryImpl implements MitraRepository
{
    public function save($data)
    {
        return Mitra::create($data);
    }

    public function findAll()
    {
        return Mitra::all();
    }

    public function findById($id)
    {
        return Mitra::findOrFail($id);
    }

    public function update($data, $id)
    {
        Mitra::where('id', $id)->update($data);
        return $this->findById($id);
    }
}