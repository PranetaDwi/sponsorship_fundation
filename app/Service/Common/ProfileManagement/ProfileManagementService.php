<?php

namespace App\Service\Common\ProfileManagement;

use App\Http\Requests\Common\ProfileManagement\EmailRequest;
use App\Http\Requests\Common\ProfileManagement\FullNameRequest;
use App\Http\Requests\Common\ProfileManagement\PasswordRequest;
use App\Http\Requests\Common\ProfileManagement\PhoneRequest;
use Illuminate\Http\Request;

interface ProfileManagementService
{
    public function getMyProfile();

    public function updateFullName(FullNameRequest $request);

    public function updateEmail(EmailRequest $request);

    public function updatePhone(PhoneRequest $request);

    public function updatePassword(PasswordRequest $request);

}