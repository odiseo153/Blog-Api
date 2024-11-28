<?php

namespace App\Category\Domain\Services;

use App\Category\Domain\Contracts\CategoryRepositoryPort;

class ListCategoriesService
{
    private CategoryRepositoryPort $categoryRepository;

    public function __construct(CategoryRepositoryPort $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function execute(int $perPage)
    {
        return $this->categoryRepository->getAll($perPage);
    }
}
