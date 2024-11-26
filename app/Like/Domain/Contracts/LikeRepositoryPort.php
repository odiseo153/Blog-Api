<?php

namespace App\Like\Domain\Contracts;

use App\Like\Domain\Entities\Like;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface LikeRepositoryPort{
    public function getAll(int $perPage):LengthAwarePaginator;
    public function addLike(Like $like):Like;
    public function deleteLike($id);

}