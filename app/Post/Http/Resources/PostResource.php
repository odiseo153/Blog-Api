<?php

namespace App\Post\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'type' => 'posts',
            'id' => $this->id,
            'attributes' => [
                'title' => $this->title,
                'content' => $this->content,
                'user_id' => $this->user_id,
                'publish_date' => $this->publish_date,
                'category_id' => $this->category_id,
                'views_count' => $this->views_count,
                'like_count' => $this->like_count,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
            ],
            'author' => $this->author ,
            'comments' => $this->comments 
        ];
    }
}





