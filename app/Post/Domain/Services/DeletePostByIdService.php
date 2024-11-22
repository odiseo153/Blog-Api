<?php

namespace App\Post\Domain\Services;

use App\Post\Domain\Contracts\PostRepositoryPort;
use Illuminate\Support\Facades\Log;

class DeletePostByIdService
{
    private PostRepositoryPort $postRepository;

    public function __construct(PostRepositoryPort $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function execute($id)
    {
   
        return $this->postRepository->deleteById($id);
    }
}



