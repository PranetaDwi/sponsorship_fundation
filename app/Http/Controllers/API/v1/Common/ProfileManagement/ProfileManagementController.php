<?php

namespace App\Http\Controllers\API\V1\Common\ProfileManagement;

use App\Http\Controllers\Controller;
use App\Http\Resources\Common\ProfileManagement\ProfileManagementResource;
use App\Http\Responses\ApiResponse;
use App\Service\Common\ProfileManagement\ProfileManagementService;

class ProfileManagementController extends Controller
{
    protected $profileManagementService;

    public function __construct(ProfileManagementService $profileManagementService)
    {
        $this->profileManagementService = $profileManagementService;
    }

    public function getMyProfile()
    {
        try {
            $myProfile = $this->profileManagementService->getMyProfile();
            return new ApiResponse('success',  __('validation.message.loaded'), new ProfileManagementResource($myProfile), 200);
        } catch (\Exception $exception) {
            return new ApiResponse('error',  $exception->getMessage(), null, $exception->getCode());
        }
    }
}
