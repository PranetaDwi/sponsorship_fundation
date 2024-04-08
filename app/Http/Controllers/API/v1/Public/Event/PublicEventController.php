<?php

namespace App\Http\Controllers\API\v1\Public\Event;

use App\Http\Controllers\Controller;
use App\Http\Resources\Public\Event\EventDetailResource;
use App\Http\Resources\Public\Event\EventOverviewResource;
use App\Http\Responses\ApiResponse;
use App\Service\Public\Event\PublicEventService;

class PublicEventController extends Controller
{
    protected $publicEventService;

    public function __construct(PublicEventService $publicEventService)
    {
        $this->publicEventService = $publicEventService;
    }

    public function getOverviewEventPopuler(){
        try {
            $eventPopuler = $this->publicEventService->getOverviewEventPopuler();
            return new ApiResponse('success',  __('validation.message.loaded'), EventOverviewResource::collection($eventPopuler), 200);
        } catch (\Exception $exception) {
            return new ApiResponse('error',  $exception->getMessage(), null, $exception->getCode());
        }
    }

    public function getOverviewEventAll(){
        try {
            $eventAll = $this->publicEventService->getOverviewEventAll();
            return new ApiResponse('success',  __('validation.message.loaded'), EventOverviewResource::collection($eventAll), 200);
        } catch (\Exception $exception) {
            return new ApiResponse('error',  $exception->getMessage(), null, $exception->getCode());
        }
    }

    public function getEventDetail(string $event_id)
    {
        try {
            $eventDetail = $this->publicEventService->getEventDetail($event_id);
            return new ApiResponse('success',  __('validation.message.loaded'), new EventDetailResource($eventDetail), 200);
        } catch (\Exception $exception) {
            return new ApiResponse('error',  $exception->getMessage(), null, $exception->getCode());
        }
    }

    public function getOverviewEventByCategory(string $category){
        try {
            $eventByCategory = $this->publicEventService->getOverviewEventByCategory($category);
            return new ApiResponse('success',  __('validation.message.loaded'), EventOverviewResource::collection($eventByCategory), 200);
        } catch (\Exception $exception) {
            return new ApiResponse('error',  $exception->getMessage(), null, $exception->getCode());
        }
    }
}
