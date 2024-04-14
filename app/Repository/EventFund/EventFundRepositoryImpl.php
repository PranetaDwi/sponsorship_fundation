<?php

namespace App\Repository\EventFund;

use App\Models\EventFund;

class EventFundRepositoryImpl implements EventFundRepository
{
    public function save($data)
    {
        return EventFund::create($data);
    }
}