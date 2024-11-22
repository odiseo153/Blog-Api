<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ApiController;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Database\Eloquent\ModelNotFoundException;



class UserController extends ApiController
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index() {
        return UserResource::collection($this->userService->listUsers());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $model = [
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => bcrypt($request->input('data.attributes.password')),
        ];
        return new UserResource($this->userService->createUser($model));
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
      return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($user_id)
    {
        try {
            $user = User::findOrFail($user_id);
            $user->delete();
            return $this->success('User deleted successfully');
        } catch (ModelNotFoundException $e) {
            return $this->error('User not found', 404);
        }
    }
}
