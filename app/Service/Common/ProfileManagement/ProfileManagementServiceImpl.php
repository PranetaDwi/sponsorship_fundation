<?php

namespace App\Service\Common\ProfileManagement;

use App\Repository\User\UserRepository;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Common\ProfileManagement\EmailRequest;
use App\Http\Requests\Common\ProfileManagement\FullNameRequest;
use App\Http\Requests\Common\ProfileManagement\PasswordRequest;
use App\Http\Requests\Common\ProfileManagement\PhoneRequest;
use App\Repository\UserData\UserDataRepository;
use Illuminate\Http\Request;

class ProfileManagementServiceImpl implements ProfileManagementService
{
    protected $userRepository;
    protected $userDataRepository;

    public function __construct(UserRepository $userRepository, UserDataRepository $userDataRepository)
    {
        $this->userRepository = $userRepository;
        $this->userDataRepository = $userDataRepository;
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

    public function updateFullName(FullNameRequest $request){
        try{
            $data = $request->validated();
            return $this->userDataRepository->fillUpdateById($data);
        } catch (\Exception $exception){
            dd($exception->getMessage());
            throw new Exception(__('validation.message.something_went_wrong'), 500);
        }catch (AuthorizationException $exception) {
            throw new Exception('You are not authorized to access', 403);
        }
    }

    public function updateEmail(EmailRequest $request){
        try{
            $data = $request->validated();
            return $this->userRepository->fillUpdateById($data);
        } catch (\Exception $exception){
            throw new Exception(__('validation.message.something_went_wrong'), 500);
        }catch (AuthorizationException $exception) {
            throw new Exception('You are not authorized to access', 403);
        }
    }

    public function updatePhone(PhoneRequest $request){
        try{
            $data = $request->validated();
            return $this->userDataRepository->fillUpdateById($data);
        } catch (\Exception $exception){
            throw new Exception(__('validation.message.something_went_wrong'), 500);
        }catch (AuthorizationException $exception) {
            throw new Exception('You are not authorized to access', 403);
        }
    }

    public function checkLastPassword(Request $request){
        try{
            
        } catch (\Exception $exception){
            throw new Exception(__('validation.message.something_went_wrong'), 500);
        }catch (AuthorizationException $exception) {
            throw new Exception('You are not authorized to access', 403);
        }
    }

    public function updatePassword(PasswordRequest $request){
        try{
            $data = $request->validated();
            return $this->userDataRepository->fillUpdateById($data);
        } catch (\Exception $exception){
            throw new Exception(__('validation.message.something_went_wrong'), 500);
        }catch (AuthorizationException $exception) {
            throw new Exception('You are not authorized to access', 403);
        }
    }
}