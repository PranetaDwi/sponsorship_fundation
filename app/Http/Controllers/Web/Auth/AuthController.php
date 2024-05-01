<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $token = $request->input('token');
        $userDatas = $request->input('userDatas');
        session(['access_token' => $token, 'user' => $userDatas]);
        return response()->json(['message' => 'Token berhasil disimpan.', 'access_token' => $token, 'userDatas' => $userDatas]);
    }

    public function logout()
    {
        Session::forget('access_token');
        Session::forget('user');
        auth()->logout();
        return response()->json(['message' => 'Anda telah logout.']);
    }

}
