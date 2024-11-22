<?php

namespace App\Post\Domain\Services;

use App\Post\Domain\Contracts\PostRepositoryPort;
use App\Post\Domain\Entities\Post;


class UpdatePostService
{
    private PostRepositoryPort $postRepository;

    public function __construct(PostRepositoryPort $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function execute($id,array $data):Post
    {
        return $this->postRepository->update($id,$data);
    }
}


 