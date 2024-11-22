<?php

namespace App\Comment\Domain\Services;

use App\Comment\Domain\Contracts\CommentRepositoryPort;

class ListCommentsService {
    private CommentRepositoryPort $commentRepository;

    public function __construct(CommentRepositoryPort $commentRepository) {
        $this->commentRepository = $commentRepository;
    }


    public function execute(int $perPage) {
        return $this->commentRepository->getAll($perPage);
    }

    
}