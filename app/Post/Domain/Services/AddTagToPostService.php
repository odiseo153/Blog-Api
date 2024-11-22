<?php

namespace App\Post\Domain\Services;

use App\Post\Domain\Contracts\PostRepositoryPort;

class AddTagToPostService
{
    private PostRepositoryPort $postRepository;

    public function __construct(PostRepositoryPort $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function execute(string $idPost,string $idTag)
    {
        return $this->postRepository->addTagToPost($idPost,$idTag);
    }
}




