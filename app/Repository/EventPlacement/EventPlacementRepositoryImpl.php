<?php

namespace App\Repository\EventPlacementRepository;

use App\Models\EventPlacement;
use App\Repository\EventPlaceementRepository\EventPlacementRepository;

class EventPlacementRepositoryImpl implements EventPlacementRepository
{
    public function save($data, $event_id)
    {
        return EventPlacement::create($data);
    }
}