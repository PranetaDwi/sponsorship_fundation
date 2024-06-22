<?php

namespace App\Repository\EventFund;

use App\Models\EventFund;

class EventFundRepositoryImpl implements EventFundRepository
{
    public function save($data)
    {
        return EventFund::create($data);
    }

    public function update($data, $event_id)
    {
        return EventFund::where('event_id', $event_id)->update($data);
    }
}