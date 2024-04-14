<?php

namespace App\Repository\KontraprestasiRepository;

use App\Models\Kontraprestasi;
use App\Repository\Kontraprestasi\KontraptrestasiRepository;

class KontraprestasiRepositoryImpl implements KontraptrestasiRepository
{
    public function save($data, $event_id)
    {
        return Kontraprestasi::create($data);
    }
}