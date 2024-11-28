<?php

namespace App\Category\Adapters\Controller;

use App\Category\Domain\Services\CreateCategoryService;
use App\Category\Domain\Services\ListCategoriesService;
use App\Category\Domain\Services\ListCategoryByIdService;
use App\Category\Http\Requests\CreateCategoryRequest;
use App\Category\Http\Resources\CategoryResource;
use Illuminate\Http\Request;
use App\Shared\Controllers\BaseController;



class CategoryController extends BaseController {
    private CreateCategoryService $createCategoryService;
    private ListCategoriesService $listCategoriesService;
    private ListCategoryByIdService $listCategoryByIdService;

    public function __construct(CreateCategoryService $createCategoryService,ListCategoriesService $listCategoriesService,ListCategoryByIdService $listCategoryByIdService) {
        $this->createCategoryService = $createCategoryService;
        $this->listCategoriesService = $listCategoriesService;
        $this->listCategoryByIdService = $listCategoryByIdService;
    }

    
    public function index(Request $request) {
        $data = $this->getPerPage($request);
        $category = $this->listCategoriesService->execute($data);
        return CategoryResource::collection($category);
    }

    public function show($id) {
        $category = $this->listCategoryByIdService->execute($id);
        return new CategoryResource($category);
    }

    public function store(CreateCategoryRequest $request) {
        $data = $request->validated();
        $category = $this->createCategoryService->execute($data);
        return new CategoryResource($category);
    }

}  




