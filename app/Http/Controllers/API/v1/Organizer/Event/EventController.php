<?php

namespace App\Http\Controllers\API\v1\Organizer\Event;

use App\Http\Controllers\Controller;
use App\Http\Requests\Organizer\Event\CreateEventFundRequest;
use App\Http\Requests\Organizer\Event\CreateEventInformationRequest;
use App\Http\Requests\Organizer\Event\CreateEventKontraprestasiRequest;
use App\Http\Requests\Organizer\Event\CreateEventPlacementRequest;
use App\Http\Resources\Organizer\Event\EventCategoriesResource;
use App\Http\Resources\Organizer\Event\EventPreviewResource;
use Illuminate\Http\Request;
use App\Service\Organizer\Event\EventService;
use App\Http\Responses\ApiResponse;

class EventController extends Controller
{

    protected $eventService;

    public function __construct(EventService $eventService)
    {
        $this->eventService = $eventService;
    }

    public function index()
    {
        try {
            $myEvents = $this->eventService->getMyEvents();
            return new ApiResponse('success',  __('validation.message.loaded'), EventPreviewResource::collection($myEvents), 200);
        } catch (\Exception $exception) {
            return new ApiResponse('error',  $exception->getMessage(), null, $exception->getCode());
        }
    }

    public function eventCategories()
    {
        try {
            $eventCategories = $this->eventService->getEventCategories();
            return new ApiResponse('success',  __('validation.message.loaded'), EventCategoriesResource::collection($eventCategories), 200);
        } catch (\Exception $exception) {
            return new ApiResponse('error',  $exception->getMessage(), null, $exception->getCode());
        }
    }

    public function postEventInformation(CreateEventInformationRequest $request)
    {
        try {
            return new ApiResponse('success',  __('validation.message.created'), $this->eventService->postEventInformation($request), 200);
        } catch (\Exception $exception) {
            return new ApiResponse('error',  $exception->getMessage(), null, $exception->getCode());
        }
    }

    public function postEventFund(CreateEventFundRequest $request, $event_id)
    {
        try {
            return new ApiResponse('success',  __('validation.message.created'), $this->eventService->postEventFund($request, $event_id), 200);
        } catch (\Exception $exception) {
            return new ApiResponse('error',  $exception->getMessage(), null, $exception->getCode());
        }
    }

    public function postEventPlacement(CreateEventPlacementRequest $request, $event_id)
    {
        try {
            return new ApiResponse('success',  __('validation.message.created'), $this->eventService->postEventPlacement($request, $event_id), 200);
        } catch (\Exception $exception) {
            return new ApiResponse('error',  $exception->getMessage(), null, $exception->getCode());
        }
    }

    public function postKontraprestasi(CreateEventKontraprestasiRequest $request, $event_id)
    {
        try {
            return new ApiResponse('success',  __('validation.message.created'), $this->eventService->postKontraprestasi($request, $event_id), 200);
        } catch (\Exception $exception) {
            return new ApiResponse('error',  $exception->getMessage(), null, $exception->getCode());
        }
    }   

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
