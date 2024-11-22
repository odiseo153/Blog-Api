<?php

namespace App\Comment\Adapters\Repositories;

use App\Models\Comment as CommentModel;
use App\Comment\Domain\Entities\Comment;
use App\Shared\Repositories\BaseRepository;
use App\Comment\Domain\Contracts\CommentRepositoryPort;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class CommentRepository extends BaseRepository implements CommentRepositoryPort{
    public function __construct()
    {
        parent::__construct(CommentModel::class);
    }

    public function getAll(int $perPage, array $filters = [], array $sorts = [], string $defaultSort = 'updated_at', array $with = ['user','post']): LengthAwarePaginator
    {
        return parent::getAll($perPage, $filters, $sorts, $defaultSort, $with);
    }

    public function getCommentsFromPost($postId) 
    {
        $comments = CommentModel::with(['user','post'])->where('post_id',$postId)->get();
        return $comments->toArray(); 
    }

    public function createComment(Comment $data)
    {
        $commentModel = CommentModel::create([
            'user_id' => $data->user_id,
            'content' => $data->content,
            'post_id' => $data->post_id,
            'parent_id' => $data->parent_comment_id,
        ]);

        return new Comment($commentModel->toArray());
    }
} 