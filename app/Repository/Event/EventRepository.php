<?php

namespace App\Repository\Event;

interface EventRepository
{
    public function save($data);

    public function findAll();

    public function findById($id);

    public function findByOrganizerId($organizerId);
}