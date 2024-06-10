<?php

namespace App\Service\Organizer\Event;

use App\Http\Requests\Organizer\Event\CreateEventFundRequest;
use App\Http\Requests\Organizer\Event\CreateEventInformationRequest;
use App\Http\Requests\Organizer\Event\CreateEventKontraprestasiRequest;
use App\Http\Requests\Organizer\Event\CreateEventPlacementRequest;
use App\Http\Requests\Organizer\Event\UpdateEventRequest;

interface EventService
{
    public function getMyEvents();

    public function getEventCategories();
    
    public function postEventInformation(CreateEventInformationRequest $request);

    public function postEventFund(CreateEventFundRequest $request,$event_id);

    public function postEventPlacement(CreateEventPlacementRequest $request, $event_id);

    public function postKontraprestasi(CreateEventKontraprestasiRequest $request, $event_id);

    public function updateEvent(UpdateEventRequest$request, $event_id);

    public function updateEventKontraprestasi(CreateEventKontraprestasiRequest $request, $id);

    public function getTotalDonorship();
}