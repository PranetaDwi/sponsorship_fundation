<?php

namespace App\Service\Event;

use App\Http\Requests\Event\CreateNewEventRequest;

interface EventService
{
    public function getEvents();

    public function postEvents(CreateNewEventRequest $request);

    public function editEvents(string $id);

    public function addEventProof(string $id);

    public function deleteEvent(string $id);

}