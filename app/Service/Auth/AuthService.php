<?php

namespace App\Service\Auth;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Http\Request;

interface AuthService
{
    public function login(LoginRequest $request);

    public function organizerRegister(RegisterRequest $request);

    public function entrepreneurRegister(RegisterRequest $request);

    public function logout(Request $request);

}