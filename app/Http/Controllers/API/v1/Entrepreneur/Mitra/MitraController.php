<?php

namespace App\Http\Controllers\API\v1\Entrepreneur\Mitra;

use App\Http\Controllers\Controller;
use App\Http\Requests\Entrepreneur\Mitra\MitraEnrollmentRequest;
use App\Http\Resources\Entrepreneur\Mitra\MitraResource;
use Illuminate\Http\Request;
use App\Service\Entrepreneur\Mitra\MitraService;
use App\Http\Responses\ApiResponse;


class MitraController extends Controller
{
    protected $mitraService;

    public function __construct(MitraService $mitraService)
    {
        $this->mitraService = $mitraService;
    }

    public function index()
    {
        try {
            $mitraList = $this->mitraService->getMitraLists();
            return new ApiResponse('success',  __('validation.message.loaded'), MitraResource::collection($mitraList), 200);
        } catch (\Exception $exception) {
            return new ApiResponse('error',  $exception->getMessage(), null, $exception->getCode());
        }
    }

    public function store($user_id, MitraEnrollmentRequest $request)
    {
        try {
            return new ApiResponse('success',  __('validation.message.created'), $this->mitraService->postMitraEnrollment($request, $user_id), 200);
        } catch (\Exception $exception) {
            return new ApiResponse('error',  $exception->getMessage(), null, $exception->getCode());
        }
    }
}
