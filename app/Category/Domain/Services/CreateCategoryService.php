<?php

namespace App\Category\Domain\Services;

use App\Category\Domain\Entities\Category;
use App\Category\Domain\Contracts\CategoryRepositoryPort;

class CreateCategoryService
{
    private CategoryRepositoryPort $categoryRepository;

    public function __construct(CategoryRepositoryPort $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function execute(array $data)
    {
        $category = new Category($data);
        return $this->categoryRepository->CreateCategory($category);
    }
}
