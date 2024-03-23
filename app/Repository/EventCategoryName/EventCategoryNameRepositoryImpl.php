<?php

namespace App\Repository\EventCategoryName;

use App\Models\EventCategoryName;

class EventCategoryNameRepositoryImpl implements EventCategoryNameRepository
{
    public function save($data)
    {
        return EventCategoryName::create($data);
    }

    public function findAll()
    {
        return EventCategoryName::all();
    }

    public function findById($id)
    {
        return EventCategoryName::findOrFail($id);
    }
}