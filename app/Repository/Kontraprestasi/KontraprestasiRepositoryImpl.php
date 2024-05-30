<?php

namespace App\Repository\Kontraprestasi;

use App\Models\Kontraprestasi;

class KontraprestasiRepositoryImpl implements KontraprestasiRepository
{
    public function save($data)
    {
        return Kontraprestasi::create($data);

    }

    public function findByEventId($event_id)
    {
        return Kontraprestasi::where('event_id', $event_id)->get();
    }

    public function findByIdAndEventId($event_id, $id)
    {
        return Kontraprestasi::where('event_id', $event_id)->where('id', $id)->first();
    }

    public function findById($id)
    {
        return Kontraprestasi::where('id', $id)->first();
    }

    public function update($data, $id)
    {
        return Kontraprestasi::where('id', $id)->update($data);
    }

}