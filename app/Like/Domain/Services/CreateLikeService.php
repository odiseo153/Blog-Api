<?php  

namespace App\Like\Domain\Services;

use App\Like\Domain\Entities\Like;
use App\Like\Domain\Contracts\LikeRepositoryPort;

class CreateLikeService{
    private LikeRepositoryPort $likeRepository;

    public function __construct(LikeRepositoryPort $likeRepository)
    {
        $this->likeRepository = $likeRepository;
    }

    public function execute(array $data): Like
    {
        $like = new Like($data);
        return $this->likeRepository->addLike($like);
    }
}