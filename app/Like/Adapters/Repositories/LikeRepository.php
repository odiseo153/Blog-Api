<?php

namespace App\Like\Adapters\Repositories;

use App\Models\Like as LikeModel;
use App\Like\Domain\Entities\Like;
use App\Shared\Repositories\BaseRepository;
use App\Like\Domain\Contracts\LikeRepositoryPort;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;


class LikeRepository extends BaseRepository implements LikeRepositoryPort
{
    
    public function __construct()
    {
        parent::__construct(LikeModel::class);
    }

    public function getAll(int $perPage, array $filters = [], array $sorts = [], string $defaultSort = 'updated_at', array $with = ['user','post']): LengthAwarePaginator
    {
        return parent::getAll($perPage, $filters, $sorts, $defaultSort, $with);
    }

    public function addLike(Like $like):Like
    {
        $likeModel = LikeModel::create([
            'user_id' => $like->user_id,
            'post_id' => $like->post_id
        ]); 

        return new Like($likeModel->toArray());
    }

    public function deleteLike($id)
    {
        LikeModel::destroy($id);
    }


}