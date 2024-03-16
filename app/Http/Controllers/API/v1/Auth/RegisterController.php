<?php

namespace App\Http\Controllers\API\v1\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Responses\ApiResponse;
use App\Http\Requests\Auth\RegisterRequest;
use App\Service\Auth\AuthService;

class RegisterController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function userRegister(RegisterRequest $request)
    {
        try{
            return new ApiResponse('success',  __('validation.message.registered'), $this->authService->userRegister($request), 201);
        }catch (\Exception $exception){
            dd($exception->getMessage());
            return new ApiResponse('error', $exception->getMessage(), null, $exception->getCode());
        }
    }
}
