<?php

namespace App\Comment\Domain\Services;

use App\Comment\Domain\Contracts\CommentRepositoryPort;

class ListCommentsByPostId {
    private CommentRepositoryPort $commentRepository;

    public function __construct(CommentRepositoryPort $commentRepository) {
        $this->commentRepository = $commentRepository;
    }


    public function execute($postId) {

        return $this->commentRepository->getCommentsFromPost($postId);
    }

    
}