<?php

namespace App\Post\Domain\Contracts;

use App\Post\Domain\Entities\Post;
use \Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface PostRepositoryPort
{
    public function create(Post $user): Post;
    public function getAll(int $perPage): LengthAwarePaginator;
    public function deleteById($id);
    public function findById(string $id): Post;
    public function addTagToPost(string $idPost,string $idTag): Post;
    public function update(string $id, array $data): Post;
}





