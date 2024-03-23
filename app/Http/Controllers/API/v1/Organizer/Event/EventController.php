<?php

namespace App\Http\Controllers\API\v1\Organizer\Event;

use App\Http\Controllers\Controller;
use App\Http\Requests\Organizer\Event\CreateNewEventRequest;
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

    public function create()
    {
        //
    }

    public function store(CreateNewEventRequest $request)
    {
        try {
            return new ApiResponse('success',  __('validation.message.created'), $this->eventService->postEvents($request), 200);
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
