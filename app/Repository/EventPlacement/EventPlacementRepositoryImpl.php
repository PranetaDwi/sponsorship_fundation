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
}