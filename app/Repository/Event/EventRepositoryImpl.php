<?php

namespace App\Repository\Event;

use App\Models\Event;

class EventRepositoryImpl implements EventRepository
{
    public function save($data)
    {
        return Event::create($data);
    }

    public function findAll()
    {
        return Event::all();
    }

    public function findById($id)
    {
        return Event::findOrFail($id);
    }

    public function findByOrganizerId($organizerId)
    {
        return Event::where('organizer_id', $organizerId)->get();
    }
}