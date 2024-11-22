<?php
namespace App\Comment\Domain\Entities;

class Comment
{
    public $id;
    public $content;
    public $user_id;
    public $post_id;
    public $parent_comment_id; 
    public $user; 
    public $post; 

    public function __construct(array $data)
    {
        $this->id = $data['id'] ?? null;
        $this->content = $data['content'] ?? null; // Fixed: added content assignment
        $this->user_id = $data['user_id'] ?? null; // Fixed: added user_id assignment
        $this->post_id = $data['post_id'] ?? null;
        $this->user = $data['users'] ?? null;
        $this->post = $data['posts'] ?? null;
        $this->parent_comment_id = $data['parent_comment_id'] ?? null;
        $this->created_at = $data['created_at'] ?? null;
        $this->updated_at = $data['updated_at'] ?? null;
    }
}