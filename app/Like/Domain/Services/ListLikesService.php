<?php

namespace App\Like\Domain\Services;

use App\Like\Domain\Contracts\LikeRepositoryPort;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;


class ListLikesService{
    private LikeRepositoryPort $likeRepository;

    public function __construct(LikeRepositoryPort $likeRepository)
    {
        $this->likeRepository = $likeRepository;
    }

    public function execute($perPage): LengthAwarePaginator
    {
        return $this->likeRepository->getAll($perPage);
    }
}

