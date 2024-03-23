<?php

namespace App\Service\Organizer\Event;

use App\Http\Requests\Organizer\Event\CreateNewEventRequest;

interface EventService
{
    public function getMyEvents();

    public function getEventCategories();

    public function postEvents(CreateNewEventRequest $request);

    public function editEvents(string $id);

    public function addEventProof(string $id);

    public function deleteEvent(string $id);

}