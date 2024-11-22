<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostResource;
use App\Services\PostService;

class PostController extends ApiController
{

    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PostResource::collection($this->postService->listPosts());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $model = [
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => $request->user_id,
            'publish_date' => $request->publish_date,
            'category_id' => $request->category_id,
            'views_count' => $request->views_count,
            'like_count' => $request->like_count
        ];

        return new PostResource($this->postService->createPost($model)); 
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
      return new PostResource($post);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
