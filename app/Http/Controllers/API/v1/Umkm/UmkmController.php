<?php

namespace App\Http\Controllers\API\v1\Umkm;

use App\Http\Controllers\Controller;
use App\Http\Requests\Umkm\UmkmEnrollmentRequest;
use App\Http\Resources\Umkm\UmkmResource;
use Illuminate\Http\Request;
use App\Service\Umkm\UmkmService;
use App\Http\Responses\ApiResponse;


class UmkmController extends Controller
{
    protected $umkmService;

    public function __construct(UmkmService $umkmService)
    {
        $this->umkmService = $umkmService;
    }

    public function index()
    {
        try {
            $umkmList = $this->umkmService->getumkmLists();
            return new ApiResponse('success',  __('validation.message.loaded'), UmkmResource::collection($umkmList), 200);
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
    public function store(UmkmEnrollmentRequest $request)
    {
        try {
            return new ApiResponse('success',  __('validation.message.created'), $this->umkmService->postumkmEnrollment($request), 200);
        } catch (\Exception $exception) {
            return new ApiResponse('error',  $exception->getMessage(), null, $exception->getCode());
        }
    }

    public function addUmkm(string $id)
    {
        try {
            return new ApiResponse('success',  __('validation.message.created'), $this->umkmService->addUmkm($id), 200);
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
