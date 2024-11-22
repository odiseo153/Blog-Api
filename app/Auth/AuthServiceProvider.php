<?php

namespace App\Auth;

use App\Auth\Adapters\Repositories\AuthRepository;
use App\Auth\Domain\Contracts\AuthRepositoryPort;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(AuthRepositoryPort::class, AuthRepository::class);
    }

    public function boot() {}
}
