<?php

namespace App\Http\Controllers\API\v1\Public\Event;

use App\Http\Controllers\Controller;
use App\Http\Resources\Public\Event\EventInformationResource;
use App\Http\Resources\Public\Event\EventKontraprestasiResource;
use App\Http\Resources\Public\Event\EventMitraResource;
use App\Http\Resources\Public\Event\EventOverviewByCategoryResource;
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

    public function getOverviewEventByCategory($category_name_id){
        try {
            $eventByCategory = $this->publicEventService->getOverviewEventByCategory($category_name_id);
            return new ApiResponse('success',  __('validation.message.loaded'), EventOverviewByCategoryResource::collection($eventByCategory), 200);
        } catch (\Exception $exception) {
            return new ApiResponse('error',  $exception->getMessage(), null, $exception->getCode());
        }
    }

    public function getDetailEventInformation($event_id)
    {
        try {
            $eventDetail = $this->publicEventService->getDetailEventInformation($event_id);
            return new ApiResponse('success',  __('validation.message.loaded'), new EventInformationResource($eventDetail), 200);
        } catch (\Exception $exception) {
            return new ApiResponse('error',  $exception->getMessage(), null, $exception->getCode());
        }
    }

    public function getListEventKontraprestasi($event_id)
    {
        try {
            $listKontraprestasi = $this->publicEventService->getListEventKontraprestasi($event_id);
            return new ApiResponse('success',  __('validation.message.loaded'), EventKontraprestasiResource::collection($listKontraprestasi), 200);
        } catch (\Exception $exception) {
            return new ApiResponse('error',  $exception->getMessage(), null, $exception->getCode());
        }
    }

    public function getDetailEventKontraprestasi($event_id, $id)
    {
        try {
            $eventKontraprestasiDetail = $this->publicEventService->getDetailEventKontraprestasi($event_id, $id);
            return new ApiResponse('success',  __('validation.message.loaded'), new EventKontraprestasiResource($eventKontraprestasiDetail), 200);
        } catch (\Exception $exception) {
            return new ApiResponse('error',  $exception->getMessage(), null, $exception->getCode());
        }
    }

    public function getListEventMitra($event_id)
    {
        try {
            $eventMitraList = $this->publicEventService->getListEventMitra($event_id);
            return new ApiResponse('success',  __('validation.message.loaded'), EventMitraResource::collection($eventMitraList), 200);
        } catch (\Exception $exception) {
            return new ApiResponse('error',  $exception->getMessage(), null, $exception->getCode());
        }
    }

}
