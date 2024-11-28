<?php

namespace App\Category\Domain\Services;

use App\Category\Domain\Contracts\CategoryRepositoryPort;

class ListCategoryByIdService
{
    private CategoryRepositoryPort $categoryRepository;

    public function __construct(CategoryRepositoryPort $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function execute(string $id)
    {
        return $this->categoryRepository->categoryById($id);
    }
}
