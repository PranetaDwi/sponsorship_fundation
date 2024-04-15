<?php

namespace App\Repository\EventCategory;

use App\Models\EventCategory;

class EventCategoryRepositoryImpl implements EventCategoryRepository
{
    public function save($data)
    {
        return EventCategory::create($data);
    }

    public function findAll()
    {
        return EventCategory::all();
    }

    public function findById($id)
    {
        return EventCategory::findOrFail($id);
    }

    public function findByCategoryNameId($category_name_id)
    {
        return EventCategory::where('event_category_name_id', $category_name_id)->get();
        
    }
}