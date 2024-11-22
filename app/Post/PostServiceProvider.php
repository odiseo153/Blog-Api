<?php

namespace App\Post;

use App\Post\Adapters\Repositories\PostRepository;
use App\Post\Domain\Contracts\PostRepositoryPort;
use Illuminate\Support\ServiceProvider;

class PostServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(PostRepositoryPort::class, PostRepository::class);
    }

    public function boot() {}
}
