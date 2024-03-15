<?php

namespace App\Service\Auth;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\UserRegisterRequest;
use App\Http\Resources\Auth\LoginResource;
use App\Http\Responses\ApiResponse;
use App\Repository\User\UserRepository;
use App\Repository\UserData\UserDataRepository;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Laravel\Sanctum\PersonalAccessToken;

class AuthServiceImpl implements AuthService
{
    protected $userRepository;

    protected $userDataRepository;

    public function __construct(UserRepository $userRepository, UserDataRepository $userDataRepository)
    {
        $this->userRepository = $userRepository;
        $this->userDataRepository = $userDataRepository;
    }

    public function login(LoginRequest $request)
    {
        try{
            $credentials = $request->only(['email', 'password']);
            if (! Auth::attempt($credentials)) {
                Log::info('Invalid Credentials');
                throw new Exception('Invalid Credentials', 401);
            }
            $user = Auth::user();
            if ($user->status != 'active') {
                Log::info('User Inactive');
                throw new Exception('User Inactive', 401);
            }
            $token = $user->createToken($user->email.'_'.now(), [
                $user->role,
            ])->accessToken;

            $data = [
                'user' => LoginResource::make($user),
                'token' => $token,
            ];

            return $data;
        }catch (\Exception $exception) {
            throw new Exception($exception->getMessage(), $exception->getCode());
        }
    }

}
