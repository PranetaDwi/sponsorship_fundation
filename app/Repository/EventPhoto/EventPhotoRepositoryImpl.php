<?php

namespace App\Repository\EventPhoto;

use App\Models\EventCategoryName;
use App\Models\EventPhoto;

class EventPhotoRepositoryImpl implements EventPhotoRepository
{
    public function save($data)
    {
        return EventPhoto::create($data);
    }

    public function findAll()
    {
        return EventPhoto::all();
    }

    public function findById($id)
    {
        return EventPhoto::findOrFail($id);
    }

    public function update($data, $id)
    {
        $eventPhoto = EventPhoto::findOrFail($id);
        $eventPhoto->update($data);
        return $eventPhoto;
    }
}