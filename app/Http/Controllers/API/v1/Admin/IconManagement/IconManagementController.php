<?php

namespace App\Http\Controllers\API\v1\Admin\IconManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\IconManagement\PostIconRequest;
use App\Http\Resources\Admin\IconManagement\IconResource;
use App\Http\Responses\ApiResponse;
use App\Service\Admin\IconManagement\IconManagementService;

class IconManagementController extends Controller
{
    protected $iconManagementService;

    public function __construct(IconManagementService $iconManagementService)
    {
        $this->iconManagementService = $iconManagementService;
    }

    public function getIconKontraprestasi()
    {
        try {
            $IconList = $this->iconManagementService->getIconLists();
            return new ApiResponse('success',  __('validation.message.loaded'), IconResource::collection($IconList), 200);
        } catch (\Exception $exception) {
            return new ApiResponse('error',  $exception->getMessage(), null, $exception->getCode());
        }
    }

    public function postIconKontraprestasi(PostIconRequest $request)
    {
        try {
            return new ApiResponse('success',  __('validation.message.created'), $this->iconManagementService->postIconKontraprestasi($request), 200);
        } catch (\Exception $exception) {
            return new ApiResponse('error',  $exception->getMessage(), null, $exception->getCode());
        }
    }

}
