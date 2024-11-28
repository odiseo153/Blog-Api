<?php

namespace App\Post\Adapters\Repositories;

use App\Post\Sorts\TagNameSort;
use App\Post\Sorts\UserNameSort;
use App\Models\Post as PostModel;
use App\Post\Domain\Entities\Post;
use Illuminate\Support\Facades\Log;
use App\Post\Sorts\CategoryNameSort;
use Spatie\QueryBuilder\AllowedSort;
use Spatie\QueryBuilder\AllowedFilter;
use App\Shared\Repositories\BaseRepository;
use App\Post\Domain\Contracts\PostRepositoryPort;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;


class PostRepository extends BaseRepository implements PostRepositoryPort
{
    public function __construct()
    {
        parent::__construct(PostModel::class);
    }

    public function getAll(int $perPage, array $filters = [], array $sorts = [], string $defaultSort = 'updated_at', array $with = ['author','tags','comments']): LengthAwarePaginator
    {
        $sorts = [
            AllowedSort::field('title'),
            AllowedSort::field('content'),
            AllowedSort::field('publish_date'),
            AllowedSort::custom('user_name',new UserNameSort),
            AllowedSort::custom('category',new CategoryNameSort),
            AllowedSort::custom('tag_name',new TagNameSort),
        ];

        $filters = [
            AllowedFilter::scope('title'),
            AllowedFilter::scope('content'),
            AllowedFilter::scope('author_name'),
            AllowedFilter::scope('category_name'),
            AllowedFilter::scope('tag_name'),
        ];



        return parent::getAll($perPage, $filters, $sorts, $defaultSort, $with);
    }

    public function create(Post $post): Post
    {
        $postModel = PostModel::create([
            'title' => $post->title,
            'content' => $post->content,
            'user_id' => $post->user_id,
            'category_id' => $post->category_id,
        ]);

        return new Post($postModel->toArray());
    }

    public function findById(string $id): Post
    {
        $postModel = PostModel::with(['author', 'comments','tags'])->findOrFail($id);
        return new Post($postModel->toArray());
    }

    public function addTagToPost(string $idPost,string $idTag): Post
    {
        $postModel = PostModel::findOrFail($idPost);
        $postModel->tags()->attach($idTag);
        return new Post($postModel->toArray());
    }

    public function update(string $id, array $data): Post
    {
        $postModel = PostModel::findOrFail($id);
        $postModel->update($data);
        return new Post($postModel->toArray());
    }

    public function deleteById($id)
    {
        try {
            PostModel::destroy($id);
            return true;
        } catch (\Exception $e) {
            Log::error("Error deleting post with ID: {$id}. Exception: {$e->getMessage()}");
            return false;
        }
    }
}









