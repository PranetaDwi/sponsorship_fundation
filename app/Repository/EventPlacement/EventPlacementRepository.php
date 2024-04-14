<?php

namespace App\Repository\EventPlacement;

interface EventPlacementRepository
{
    public function save($data, $event_id);
}