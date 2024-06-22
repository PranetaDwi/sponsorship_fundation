<?php

namespace App\Repository\Kontraprestasi;

interface KontraprestasiRepository
{
    public function save($data);

    public function findByEventId($event_id);

    public function findByIdAndEventId($event_id, $id);

    public function findById($id);

    public function update($data, $id);

    public function delete($id);

}