<?php

namespace App\Http\Controllers\API\v1\Organizer\Event;

use App\Http\Controllers\Controller;
use App\Http\Requests\Organizer\Event\CreateEventFundRequest;
use App\Http\Requests\Organizer\Event\CreateEventInformationRequest;
use App\Http\Requests\Organizer\Event\CreateEventKontraprestasiRequest;
use App\Http\Requests\Organizer\Event\CreateEventPlacementRequest;
use App\Http\Requests\Organizer\Event\UpdateEventRequest;
use App\Http\Resources\Organizer\Event\EventCategoriesResource;
use App\Http\Resources\Organizer\Event\EventDetailBundlingResource;
use App\Http\Resources\Organizer\Event\EventPreviewResource;
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

    public function postEventAll(UpdateEventRequest $request)
    {
        try {
            return new ApiResponse('success',  __('validation.message.created'), $this->eventService->postEventAll($request), 200);
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

    public function getDetailEventBundling($id)
    {
        try {
            $eventDetail = $this->eventService->getDetailEvent($id);
            return new ApiResponse('success',  __('validation.message.loaded'), new EventDetailBundlingResource($eventDetail), 200);
        } catch (\Exception $exception) {
            return new ApiResponse('error',  $exception->getMessage(), null, $exception->getCode());
        }
    }
    
    public function updateEvent(UpdateEventRequest $request, $event_id)
    {
        try {
            return new ApiResponse('success',  __('validation.message.created'), $this->eventService->updateEvent($request, $event_id), 200);
        } catch (\Exception $exception) {
            return new ApiResponse('error',  $exception->getMessage(), null, $exception->getCode());
        }
    }

    public function postUpdateKontraprestasi(CreateEventKontraprestasiRequest $request, $event_id)
    {
        try {
            return new ApiResponse('success',  __('validation.message.created'), $this->eventService->updateEventKontraprestasi($request, $event_id), 200);
        } catch (\Exception $exception) {
            return new ApiResponse('error',  $exception->getMessage(), null, $exception->getCode());
        }
    }

    public function getTotalDonorship()
    {
        $totalDonorship = $this->eventService->getTotalDonorship();
        try {
            return new ApiResponse('success',  __('validation.message.loaded'), $totalDonorship, 200);
        } catch (\Exception $exception) {
            return new ApiResponse('error',  $exception->getMessage(), null, $exception->getCode());
        }
    }

    public function deleteEvent($id){
        try {
            return new ApiResponse('success',  __('validation.message.deleted'), $this->eventService->deleteEvent($id), 200);
        } catch (\Exception $exception) {
            return new ApiResponse('error',  $exception->getMessage(), null, $exception->getCode());
        }
    }

    public function deleteEventKontraprestasi($id)
    {
        try {
            return new ApiResponse('success',  __('validation.message.deleted'), $this->eventService->deleteEventKontraprestasi($id), 200);
        } catch (\Exception $exception) {
            return new ApiResponse('error',  $exception->getMessage(), null, $exception->getCode());
        }
    }

}
