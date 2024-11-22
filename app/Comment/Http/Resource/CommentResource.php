<?php

namespace App\Comment\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'type' => 'comments',
            'id' => $this->id,
            'attributes' => [
                'user_id' => $this->user_id,
                'content' => $this->content,
                'post_id' => $this->post_id,
                'parent_id' => $this->parent_id,
            ],
            'user' => $this->user ,
            'comments' => $this->post 
        ];
    }
}





