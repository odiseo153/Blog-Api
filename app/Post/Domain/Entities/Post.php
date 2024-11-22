<?php
namespace App\Post\Domain\Entities;

class Post
{
    public $id;
    public $title;
    public $content;
    public $user_id;
    public $publish_date;
    public $category_id;
    public $views_count;
    public $like_count;
    public $created_at;
    public $updated_at;
    public $author; 
    public $tags; 
    public $comments; 

    public function __construct(array $data)
    {
        $this->id = $data['id'] ?? null;
        $this->title = $data['title'] ?? null; // Fixed: changed 'name' to 'title'
        $this->content = $data['content'] ?? null; // Fixed: added content assignment
        $this->user_id = $data['user_id'] ?? null; // Fixed: added user_id assignment
        $this->publish_date = $data['publish_date'] ?? null; // Fixed: added publish_date assignment
        $this->category_id = $data['category_id'] ?? null; // Fixed: added category_id assignment
        $this->views_count = $data['views_count'] ?? 0; // Default to 0
        $this->like_count = $data['like_count'] ?? 0; // Default to 0
        $this->user = $data['author'] ?? null;
        $this->tags = $data['tags'] ?? null;
        $this->comments = $data['comments'] ?? null;
        $this->created_at = $data['created_at'] ?? null;
        $this->updated_at = $data['updated_at'] ?? null;
    }
}