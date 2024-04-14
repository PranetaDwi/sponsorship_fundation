<?php

namespace App\Repository\EventFundRepository;

interface EventFundRepository
{
    public function save($data, $event_id);

}