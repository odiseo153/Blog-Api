<?php

namespace App\Comment;

use App\Comment\Adapters\Repositories\CommentRepository;
use Illuminate\Support\ServiceProvider;
use App\Comment\Domain\Contracts\CommentRepositoryPort;

class CommentServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(CommentRepositoryPort::class, CommentRepository::class);
    }

    public function boot() {}
}
