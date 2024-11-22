<?php

namespace App\Comment\Adapters\Controllers;

use Illuminate\Http\Request;
use App\Shared\Controllers\BaseController;
use App\Comment\Http\Requests\CreateCommentRequest;
use App\Comment\Domain\Services\ListCommentsService;
use App\Comment\Domain\Services\CreateCommentService;
use App\Comment\Domain\Services\ListCommentsByPostId;
use App\Comment\Http\Resources\CommentResource;

class CommentController extends BaseController
{
    private ListCommentsService $listCommentService;
    private ListCommentsByPostId $listCommentsByPostBy;
    private CreateCommentService $createCommentService;

    public function __construct(ListCommentsService $listCommentService, CreateCommentService $createCommentService, ListCommentsByPostId $listCommentsByPostBy)
    {
        $this->listCommentService = $listCommentService;
        $this->createCommentService = $createCommentService;
        $this->listCommentsByPostBy = $listCommentsByPostBy;
    }


    public function index(Request $request)
    {
        $perPage = $this->getPerPage($request);
        $comments = $this->listCommentService->execute($perPage);
       // return CommentResource::collection($comments);
        return response()->json($comments);
    }

    public function store(CreateCommentRequest $request)
    {
        $data = $request->validated();
        $comments = $this->createCommentService->execute($data);
        return response()->json($comments);
        //return new CommentResource($comments);
    }

    public function getCommentsByPost($postId)
    {
        $comments = $this->listCommentsByPostBy->execute($postId);
        //return CommentResource::collection($comments);
        return response()->json($comments);

    }
}


