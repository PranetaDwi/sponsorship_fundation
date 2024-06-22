<?php

namespace App\Repository\EventFund;

interface EventFundRepository
{
    public function save($data);

    public function update($data, $event_id);

}