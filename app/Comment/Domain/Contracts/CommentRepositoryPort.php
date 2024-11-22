<?php


namespace App\Comment\Domain\Contracts;

use App\Comment\Domain\Entities\Comment;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;


interface CommentRepositoryPort{
    public function getAll(int $perPage): LengthAwarePaginator;
    public function getCommentsFromPost( $postId);
    public function createComment(Comment $data);
}



