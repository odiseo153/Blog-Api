<?php

namespace App\Like\Adapters\Controller;

use Illuminate\Http\Request;
use App\Like\Http\Resources\LikeResource;
use App\Shared\Controllers\BaseController;
use App\Like\Http\Requests\CreateLikeRequest;
use App\Like\Domain\Services\ListLikesService;
use App\Like\Domain\Services\CreateLikeService;



class LikeController extends BaseController {
    private CreateLikeService $createLikeService;
    private ListLikesService $listLikesService;
    
    public function __construct(CreateLikeService $createLikeService,ListLikesService $listLikesService) {
        $this->createLikeService = $createLikeService;
        $this->listLikesService = $listLikesService;
    }

    
    public function index(Request $request) {
        $data = $this->getPerPage($request);
        $like = $this->listLikesService->execute($data);
        return LikeResource::collection($like);
    }

    public function store(CreateLikeRequest $request) {
        $data = $request->validated();
        $like = $this->createLikeService->execute($data);
        return new LikeResource($like);
    }

    public function name(){
        
    }
}  




