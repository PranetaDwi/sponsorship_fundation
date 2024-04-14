<?php

namespace App\Repository\Kontraprestasi;

use App\Models\Kontraprestasi;

class KontraprestasiRepositoryImpl implements KontraprestasiRepository
{
    public function save($data)
    {
        return Kontraprestasi::create($data);

    }

}