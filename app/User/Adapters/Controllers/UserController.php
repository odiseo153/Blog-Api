<?php

namespace App\User\Adapters\Controllers;

use App\Shared\Controllers\BaseController;
use App\User\Domain\Services\CreateUserService;
use App\User\Domain\Services\FindUserByIdService;
use App\User\Domain\Services\ListUsersService;
use App\User\Http\Requests\CreateUserRequest;
use App\User\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

 
class UserController extends BaseController
{
    private CreateUserService $createUserService;
     private ListUsersService $listUsersService;
    private FindUserByIdService $findUserByIdService;

    public function __construct(CreateUserService $createUserService, ListUsersService $listUsersService, FindUserByIdService $findUserByIdService)
    {
        $this->createUserService = $createUserService;
        $this->listUsersService = $listUsersService;
        $this->findUserByIdService = $findUserByIdService;
    }

    public function index(Request $request)
    {
        $perPage = $this->getPerPage($request);
        $users = $this->listUsersService->execute($perPage);
        return UserResource::collection($users);
    }

    public function store(CreateUserRequest $request): JsonResponse 
    {
        $data = $request->validated();
        $user = $this->createUserService->execute($data);
        return response()->json(new UserResource($user), 201);
    }

    public function show($id)
    {
        $user = $this->findUserByIdService->execute($id);
        return response()->json(new UserResource($user), 200);
    }
}
