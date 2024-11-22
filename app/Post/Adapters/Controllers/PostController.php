<?php

namespace App\Post\Adapters\Controllers;

use Illuminate\Http\Request;
use App\Post\Http\Resources\PostResource;
use App\Post\Domain\Services\AddTagToPostService;
use App\Shared\Controllers\BaseController;
use App\Post\Http\Requests\CreatePostRequest;
use App\Post\Http\Requests\DeletePostRequest;
use App\Post\Http\Requests\UpdatePostRequest;
use App\Post\Domain\Services\ListPostsService;
use App\Post\Domain\Services\CreatePostService;
use App\Post\Domain\Services\UpdatePostService;
use App\Post\Domain\Services\FindPostByIdService;
use App\Post\Domain\Services\DeletePostByIdService;
use App\Post\Http\Requests\AddTagToPostRequest;

class PostController extends BaseController
{
    private ListPostsService $listPostsService;
    private CreatePostService $createPostService;
    private FindPostByIdService $findPostByIdService;
    private DeletePostByIdService $deletePostByIdService;
    private UpdatePostService $requestsUpdatePostService;
    private AddTagToPostService $addToTagToPostService;

    public function __construct(
        DeletePostByIdService $deletePostByIdService,
        FindPostByIdService $findPostByIdService,
        ListPostsService $listPostsService,
        CreatePostService $createPostService,
        UpdatePostService $requestsUpdatePostService,
        AddTagToPostService $addToTagToPostService
        )
    {
        $this->listPostsService = $listPostsService;
        $this->createPostService = $createPostService;
        $this->findPostByIdService = $findPostByIdService;
        $this->deletePostByIdService = $deletePostByIdService;
        $this->requestsUpdatePostService = $requestsUpdatePostService;
        $this->addToTagToPostService = $addToTagToPostService;

    }

    public function index(Request $request)
    {
        $perPage = $this->getPerPage($request);
        $posts = $this->listPostsService->execute($perPage);
        return PostResource::collection($posts);
    } 

    public function show($id)
    {
        $posts = $this->findPostByIdService->execute($id);
        return new PostResource($posts);
    }

    public function addTagToPost(AddTagToPostRequest $request) 
    {
        $data = $request->validated();
        $id = $data['post_id'];
        $tag = $data['tag_id'];
        $posts = $this->addToTagToPostService->execute($id,$tag);
        return new PostResource($posts);
    }

    public function store(CreatePostRequest $request) 
    {
        $data = $request->validated();
        $post = $this->createPostService->execute($data);
        return new PostResource($post);    
    }

    public function update($id,UpdatePostRequest $request) 
    {
        $data = $request->validated();
        $post = $this->requestsUpdatePostService->execute($id,$data);
        return new PostResource($post);    
    }

    public function destroy(DeletePostRequest $request) 
    {
        $data = $request->validated();
        $post = $this->deletePostByIdService->execute($data['id_post']);
        return response()->json(['message'=>'post deleted successfully']);
    }
        

    /*
    public function show($id)
    {
        $user = $this->findUserByIdService->execute($id);
        return response()->json(new UserResource($user), 200);
    }
    */


}
