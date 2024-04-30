<?php

namespace App\Http\Controllers\API\v1\Admin\EventCategoryManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EventCategoryManagement\PostEventCategoryRequest;
use App\Http\Resources\Organizer\Event\EventCategoriesResource;
use App\Http\Responses\ApiResponse;
use App\Service\Admin\EventCategoryManagement\EventCategoryManagementService;

class EventCategoryManagementController extends Controller
{
    protected $eventCategoryManagementService;

    public function __construct(EventCategoryManagementService $eventCategoryManagementService)
    {
        $this->eventCategoryManagementService = $eventCategoryManagementService;
    }

    public function getEventCategories()
    {
        $eventCategories = $this->eventCategoryManagementService->getCategoryLists();
        try {
            return new ApiResponse('success',  __('validation.message.created'), EventCategoriesResource::collection($eventCategories), 200);
        } catch (\Exception $exception) {
            return new ApiResponse('error',  $exception->getMessage(), null, $exception->getCode());
        }
    }

    public function postEventCategory(PostEventCategoryRequest $request)
    {
        try {
            return new ApiResponse('success',  __('validation.message.created'), $this->eventCategoryManagementService->postEventCategory($request), 200);
        } catch (\Exception $exception) {
            return new ApiResponse('error',  $exception->getMessage(), null, $exception->getCode());
        }
    }

}
