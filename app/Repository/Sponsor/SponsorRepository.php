<?php

namespace App\Repository\Sponsor;

interface SponsorRepository
{
    public function save($data);

    public function findAll();

    public function findById($id);

    public function findByEventId($event_id);
}