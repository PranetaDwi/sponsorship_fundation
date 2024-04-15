<?php

namespace App\Repository\Kontraprestasi;

interface KontraprestasiRepository
{
    public function save($data);

    public function findByEventId($event_id);

    public function findByIdAndEventId($event_id, $id);

}