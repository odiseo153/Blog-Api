<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function listUsers()
    {
        return $this->userRepository->index();
    }

    public function listById($id)
    {
        return $this->userRepository->findById($id);
    }

    public function createUser($user)
    {
        return $this->userRepository->create($user);
    }
}
