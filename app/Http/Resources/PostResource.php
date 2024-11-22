<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $attributes = [
            'title' => $this->title,
            'content' => $this->content,
            'authorId' => $this->author_id,
            'publishDate' => $this->publish_date,
            'categoryId' => $this->category_id,
            'viewsCount' => $this->views_count,
            'likeCount' => $this->like_count,
        ];

        // Conditionally merge additional attributes based on the request route
        if ($request->routeIs('posts.*')) {
            $attributes = array_merge($attributes, [
                'createdAt' => $this->created_at,
                'updatedAt' => $this->updated_at,
            ]);
        }

        return [
            'type' => 'posts',
            'id' => $this->id,
            'attributes' => $attributes,
            'links' => [
                'self' => route('posts.show', ['post' => $this->id]),
            ],
            'relationships' => $this->mergeWhen(
                $this->relationLoaded('users'), // Cambia "posts" y "comments" por las relaciones que uses
                [
                    'user' => new UserResource($this->whenLoaded('users')),
                  //  'comments' => CommentResource::collection($this->whenLoaded('comments')),
                ]
            ) ?? "nada",
        ];
    }
}