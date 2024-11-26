<?php

namespace App\Like;

use Illuminate\Support\ServiceProvider;
use App\Like\Domain\Contracts\LikeRepositoryPort;
use App\Like\Adapters\Repositories\LikeRepository;

class LikeServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(LikeRepositoryPort::class, LikeRepository::class);
    }

    public function boot() {}
}
