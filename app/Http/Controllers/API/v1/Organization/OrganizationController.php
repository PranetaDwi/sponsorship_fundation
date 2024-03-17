<?php

namespace App\Http\Controllers\API\v1\Organization;

use App\Http\Controllers\Controller;
use App\Http\Requests\Organization\OrganizationEnrollmentRequest;
use App\Http\Resources\Organization\OrganizationResource;
use App\Http\Responses\ApiResponse;
use App\Service\Organization\OrganizationService;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    protected $organizationService;

    public function __construct(OrganizationService $organizationService)
    {
        $this->organizationService = $organizationService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $organizationList = $this->organizationService->getOrganizationLists();
            return new ApiResponse('success',  __('validation.message.loaded'), OrganizationResource::collection($organizationList), 200);
        } catch (\Exception $exception) {
            return new ApiResponse('error',  $exception->getMessage(), null, $exception->getCode());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrganizationEnrollmentRequest $request)
    {
        try {
            return new ApiResponse('success',  __('validation.message.created'), $this->organizationService->postOrganizationEnrollment($request), 200);
        } catch (\Exception $exception) {
            return new ApiResponse('error',  $exception->getMessage(), null, $exception->getCode());
        }
    }

    public function addOrganization(string $id)
    {
        try {
            return new ApiResponse('success',  __('validation.message.created'), $this->organizationService->addOrganization($id), 200);
        } catch (\Exception $exception) {
            return new ApiResponse('error',  $exception->getMessage(), null, $exception->getCode());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
