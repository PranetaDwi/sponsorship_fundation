<?php

namespace App\Repository\EventFundRepository;

use App\Models\EventFund;

class EventFundRepositoryImpl implements EventFundRepository
{
    public function save($data, $event_id)
    {
        return EventFund::create($data);
    }
}