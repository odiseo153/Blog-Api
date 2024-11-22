<?php

namespace App\Services;

use App\Repositories\PostRepository;
use App\Repositories\UserRepository;

class PostService
{
    /**

    protected $postRepository;
    
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function listPosts()
    {
        return $this->postRepository->index();
    }

    public function listById($id)
    {
        return $this->postRepository->findById($id);
    }

    public function createPost($post)
    {
        return $this->postRepository->create($post);
    }
    */
}
