<?php

namespace App\Service\Common\ProfileManagement;

use App\Repository\User\UserRepository;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Auth;

class ProfileManagementServiceImpl implements ProfileManagementService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getMyProfile(){

        try {
            $user_id = Auth::user()->id;
            $userAuth = $this->userRepository->findById($user_id);
            return $userAuth;
        }catch (\Exception $exception){
            throw new Exception(__('validation.message.something_went_wrong'), 500);
        }catch (AuthorizationException $exception) {
            throw new Exception('You are not authorized to access', 403);
        }

    }
}