<?php

namespace App\Category\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'type' => 'categories',
            'id' => $this->id,
            'user' => $this->name
        ];
    }
}


