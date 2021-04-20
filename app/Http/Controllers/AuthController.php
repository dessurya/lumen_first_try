<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Traits\HttpResponseTrait;

class AuthController extends Controller
{
    use HttpResponseTrait;

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function login()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return $this->resFail('Unauthorized', 401);
            // return response()->json(['error' => 'Unauthorized'], 401);
        }
        $res = [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ];
        return $this->resSuccess('Successfully login',$res);
    }

    public function me()
    {
        return $this->resSuccess('success',json_decode(auth()->user(),true));
    }

    public function logout()
    {
        auth()->logout();
        return $this->resSuccess('Successfully logged out');
    }

    public function refresh()
    {
        $res = [
            'access_token' => auth()->refresh(),
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ];
        return $this->resSuccess('Successfully refresh token',$res);
    }
}