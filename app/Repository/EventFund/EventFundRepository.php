<?php

namespace App\Repository\EventFund;

interface EventFundRepository
{
    public function save($data, $event_id);

}