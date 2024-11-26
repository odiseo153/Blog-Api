<?php

namespace App\Auth\Adapters\Controllers;

use App\Auth\Domain\Services\MeService;
use App\Auth\Http\Requests\LoginRequest;
use App\Auth\Domain\Services\LoginService;
use App\Shared\Controllers\BaseController;
use App\Auth\Domain\Services\LogoutService;

class AuthController extends BaseController
{
    private LoginService $loginService;
    private LogoutService $logoutService;
    private MeService $meService;

    public function __construct(LoginService $loginService, LogoutService $logoutService, MeService $meService)
    {
        $this->loginService = $loginService;
        $this->logoutService = $logoutService;
        $this->meService = $meService;
    } 


    public function login(LoginRequest $request)
    {
        $data=$request->validated();
        $user = $this->loginService->execute($request['username'], $request['password']);
        return response()->json($user, 200);
    }

    public function logout()
    {
        $this->logoutService->execute();
        return response()->json(['message' => 'Successfully logged out'], 200);
    }

    public function me()
    {
        $user = $this->meService->execute();
        return response()->json($user, 200);
    }
}
