<?php

namespace App\Post\Domain\Services;

use App\Post\Domain\Contracts\PostRepositoryPort;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ListPostsService
{
    private PostRepositoryPort $postRepository;

    public function __construct(PostRepositoryPort $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function execute(int $perPage): LengthAwarePaginator
    {
        return $this->postRepository->getAll($perPage);
    }
}




