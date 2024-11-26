<?php

namespace App\Auth\Adapters\Repositories;

use App\Auth\Domain\Entities\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Auth\Domain\Contracts\AuthRepositoryPort;
use App\Auth\Domain\Exceptions\InvalidCredentialsException;

class AuthRepository implements AuthRepositoryPort
{
    public function login(User $user): array | null
    {
        if (Auth::attempt(['username' => $user->username, 'password' => $user->password])) {
            $authenticatedUser = Auth::user();
            $token = $authenticatedUser->createToken('token', ['*'], now()->addHours(15))->plainTextToken;
            return [
                'data' => [
                    'token' => $token, 
                    'username' => $authenticatedUser->username,
                    'name' => $authenticatedUser->name,
                ],
                'message' => 'Authenticated'
            ]; 
        }

        throw new InvalidCredentialsException();
    }

    public function logout(): void
    {
        Auth::user()->tokens()->delete();
    }

    public function me(): array | null
    {
        $authenticatedUser = Auth::user();
        return [
            'data' => [
                'username' => $authenticatedUser->username,
                'name' => $authenticatedUser->name,
                'role' => $authenticatedUser->role,
            ],
            'message' => 'Authenticated'
        ];
    }
}
