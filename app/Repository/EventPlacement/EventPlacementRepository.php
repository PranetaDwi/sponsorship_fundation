<?php

namespace App\Repository\EventPlaceementRepository;

interface EventPlacementRepository
{
    public function save($data, $event_id);
}