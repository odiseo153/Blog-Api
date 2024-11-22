<?php

namespace App\Post\Domain\Services;

use App\Post\Domain\Contracts\PostRepositoryPort;
use App\Post\Domain\Entities\Post;


class FindPostByIdService
{
    private PostRepositoryPort $postRepository;

    public function __construct(PostRepositoryPort $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function execute($id): Post
    {
        return $this->postRepository->findById($id);
    }
}


