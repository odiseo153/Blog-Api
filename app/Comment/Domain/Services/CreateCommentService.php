<?php

namespace App\Comment\Domain\Services;

use App\Comment\Domain\Contracts\CommentRepositoryPort;
use App\Comment\Domain\Entities\Comment;

class CreateCommentService
{
    private CommentRepositoryPort $commentRepositoryPort;

    public function __construct(CommentRepositoryPort $commentRepositoryPort)
    {
        $this->commentRepositoryPort = $commentRepositoryPort;
    }

    public function execute(array $data)
    {
        $post = new Comment($data);
        return $this->commentRepositoryPort->createComment($post);
    }
}


