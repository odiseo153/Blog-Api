<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'users',
            'id' => $this->id,
            'attributes' => [
                'name' => $this->name,
                'email' => $this->email,
                'role' => $this->role,
                $this->mergeWhen(
                    $request->routeIs('users.*'),
                    [
                        'createdAt' => $this->created_at,
                        'updatedAt' => $this->updated_at,
                        'emailVerifiedAt' => $this->email_verified_at,
                    ]
                ),
            ],
            'links' => [
                'self' => route('users.show', ['user' => $this->id]),
            ],
            'relationships' => $this->mergeWhen(
                $this->relationLoaded('posts') || $this->relationLoaded('comments'), // Cambia "posts" y "comments" por las relaciones que uses
                [
                    'posts' => PostResource::collection($this->whenLoaded('posts')),
                  //  'comments' => CommentResource::collection($this->whenLoaded('comments')),
                ]
            ) ?? "nada",
        ];
    }
}
