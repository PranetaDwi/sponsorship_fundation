<?php

namespace App\Http\Controllers\API\v1\Common\ProfileManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Common\ProfileManagement\EmailRequest;
use App\Http\Requests\Common\ProfileManagement\FullNameRequest;
use App\Http\Requests\Common\ProfileManagement\PasswordRequest;
use App\Http\Requests\Common\ProfileManagement\PhoneRequest;
use App\Http\Resources\Common\ProfileManagement\ProfileManagementResource;
use App\Http\Responses\ApiResponse;
use App\Service\Common\ProfileManagement\ProfileManagementService;
use Illuminate\Http\Request;

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

    public function updateFullName(FullNameRequest $request){
        try {
            return new ApiResponse('success', __('validation.message.updated'), $this->profileManagementService->updateFullName($request), 200);
        } catch (\Exception $exception) {
            return new ApiResponse('error',  $exception->getMessage(), null, $exception->getCode());
        }
    }

    public function updateEmail(EmailRequest $request){
        try {
            return new ApiResponse('success', __('validation.message.updated'), $this->profileManagementService->updateEmail($request, 200));
        } catch (\Exception $exception) {
            return new ApiResponse('error',  $exception->getMessage(), null, $exception->getCode());
        }
    }

    public function updatePhone(PhoneRequest $request){
        try {
            return new ApiResponse('success', __('validation.message.updated'), $this->profileManagementService->updatePhone($request), 200);
        } catch (\Exception $exception) {
            return new ApiResponse('error',  $exception->getMessage(), null, $exception->getCode());
        }
    }

    public function checkLastPassword(Request $request){
        try {
            return new ApiResponse('success', __('validation.message.confirmed'), $this->profileManagementService->checkLastPassword($request), 200);
        } catch (\Exception $exception) {
            return new ApiResponse('error',  $exception->getMessage(), null, $exception->getCode());
        }
    }

    public function updatePassword(PasswordRequest $request){
        try {
            return new ApiResponse('success', __('validation.message.updated'), $this->profileManagementService->updatePassword($request), 200);
        } catch (\Exception $exception) {
            return new ApiResponse('error',  $exception->getMessage(), null, $exception->getCode());
        }
    }

}
