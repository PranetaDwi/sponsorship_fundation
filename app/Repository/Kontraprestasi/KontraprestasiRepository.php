<?php

namespace App\Repository\Kontraprestasi;

interface KontraptrestasiRepository
{
    public function save($data, $event_id);
}