<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\Tag;
use Tests\TestCase;

pest()->extend(TestCase::class);


/*
describe('Post Model Tests', function () {
    
it('can create a Post using the factory', function () {
    $Post = Post::factory()->create();
        try {
            expect($Post->exists)->toBeTrue();
        } finally {
            $Post->delete();
        }
    });
    
    it('can fetch a Post by ID', function () {
        $Post = Post::factory()->create();
        try {
            $response = $this->getJson('api/posts/' . $Post->id);
            $response->assertOk();
            $response->assertJsonStructure([
                'data' => [
                    'type',
                    'id',
                    'attributes'=>[
                        "title",
                        "content",
                        "authorId",
                        "publishDate",
                        "categoryId",
                        "viewsCount",
                        "likeCount",
                        "createdAt",
                        "updatedAt",
                    ],
                    'links'=>[
                        "self"
                    ],
                ],
            ]);
            
       
        } finally {
            $Post->delete();
        }
    });

    it('can delete a Post', function () {
        $Post = Post::factory()->create();
        try {
            $response = $this->deleteJson('api/posts/' . $Post->id);

            $response->assertStatus(200);
        } finally {
            $Post->delete();
        }
    });

    it('can fetch all Posts', function () {
        $response = $this->getJson('api/posts');
        $response->assertOk();
    });

    it('can create a new Post with unique data', function () {

    $postData = [
            "title" => "Javier",
            "content" => "javier@gmail.com",
            "user_id" => "01JCERT0HWE46VRRWR34Z8PPHE",
            "publish_date" => "1995-12-11 05:41:30",
            "category_id" => "01JCERT0JFQSMV5QVXZHSQGXEJ",
            "views_count" => 50,
            "like_count" => 24
        ];
        
        $response = $this->postJson('api/posts', $postData); // Convert to array if necessary
        $response->assertStatus(201);

    });

});


*/