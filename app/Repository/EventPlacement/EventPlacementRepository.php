<?php

namespace App\Repository\EventPlacement;

interface EventPlacementRepository
{
    public function save($data);

    public function update($data, $event_id);
}