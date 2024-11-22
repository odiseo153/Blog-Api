<?php

namespace App\Post\Domain\Services;

use App\Post\Domain\Contracts\PostRepositoryPort;
use App\Post\Domain\Entities\Post;


class CreatePostService
{
    private PostRepositoryPort $postRepository;

    public function __construct(PostRepositoryPort $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function execute(array $data): Post
    {
        $post = new Post($data);
        return $this->postRepository->create($post);
    }
}


