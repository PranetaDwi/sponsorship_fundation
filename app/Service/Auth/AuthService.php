<?php

namespace App\Service\Auth;

use App\Http\Requests\Auth\LoginRequest;

interface AuthService
{
    public function login(LoginRequest $request);

}