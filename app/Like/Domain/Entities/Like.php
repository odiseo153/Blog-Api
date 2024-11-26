<?php  

namespace App\Like\Domain\Entities;

class Like{
    public $id;
    public $user_id;
    public $post_id;
    public $created_at;
    public $updated_at;
    public $post;
    public $user;

    public function __construct(array $data){
        $this->id = $data['id'] ?? null;
        $this->user_id = $data['user_id'] ?? null;
        $this->post_id = $data['post_id'] ?? null;
        $this->post = $data['post'] ?? null;
        $this->user = $data['user'] ?? null;
        $this->created_at = $data['created_at'] ?? null;
        $this->updated_at = $data['updated_at'] ?? null;
    }
}



