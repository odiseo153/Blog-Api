<?php

namespace App\Like\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LikeResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'type' => 'likes',
            'id' => $this->id,
            'post' => $this->post,
            'user' => $this->user
           
        ];
    }
}



