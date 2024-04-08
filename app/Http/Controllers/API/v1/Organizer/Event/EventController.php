<?php

namespace App\Http\Controllers\API\v1\Organizer\Event;

use App\Http\Controllers\Controller;
use App\Http\Requests\Organizer\Event\CreateNewEventRequest;
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

    public function store(CreateNewEventRequest $request)
    {
        try {
            return new ApiResponse('success',  __('validation.message.created'), $this->eventService->postEvents($request), 200);
        } catch (\Exception $exception) {
            return new ApiResponse('error',  $exception->getMessage(), null, $exception->getCode());
        }
    }

    // public function getEventPopuler(){
    //     try {
    //         $eventPopuler = $this->eventService->getEventPopuler();
    //         return new ApiResponse('success',  __('validation.message.loaded'), EventOverviewResource::collection($eventPopuler), 200);
    //     } catch (\Exception $exception) {
    //         return new ApiResponse('error',  $exception->getMessage(), null, $exception->getCode());
    //     }
    // }

    // public function getOverviewEventAll(){
    //     try {
    //         $eventAll = $this->eventService->getOverviewEventAll();
    //         return new ApiResponse('success',  __('validation.message.loaded'), EventOverviewResource::collection($eventAll), 200);
    //     } catch (\Exception $exception) {
    //         return new ApiResponse('error',  $exception->getMessage(), null, $exception->getCode());
    //     }
    // }

    // public function getEventDetail(string $event_id)
    // {
    //     try {
    //         $eventDetail = $this->eventService->getEventDetail($event_id);
    //         return new ApiResponse('success',  __('validation.message.loaded'), EventDetailResource::collection($eventDetail), 200);
    //     } catch (\Exception $exception) {
    //         return new ApiResponse('error',  $exception->getMessage(), null, $exception->getCode());
    //     }
    // }

    // public function getEventByCategory(string $category){
    //     try {
    //         $eventByCategory = $this->eventService->getEventByCategory($category);
    //         return new ApiResponse('success',  __('validation.message.loaded'), EventPreviewResource::collection($eventByCategory), 200);
    //     } catch (\Exception $exception) {
    //         return new ApiResponse('error',  $exception->getMessage(), null, $exception->getCode());
    //     }
    // }

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
