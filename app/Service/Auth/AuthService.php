<?php

namespace App\Service\Auth;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;

interface AuthService
{
    public function login(LoginRequest $request);

    public function userRegister(RegisterRequest $request);

}