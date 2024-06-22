<?php

namespace App\Repository\EventPlacement;

use App\Models\EventPlacement;
use App\Repository\EventPlacement\EventPlacementRepository;

class EventPlacementRepositoryImpl implements EventPlacementRepository
{
    public function save($data)
    {
        return EventPlacement::create($data);
    }

    public function update($data, $event_id)
    {
        EventPlacement::where('event_id', $event_id)->update($data);
        return EventPlacement::where('event_id', $event_id)->first();
    }
}