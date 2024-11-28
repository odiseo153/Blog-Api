<?php

namespace App\Category\Domain\Contracts;

use App\Category\Domain\Entities\Category;

interface CategoryRepositoryPort
{
    public function getAll(int $perPage): array;
    public function categoryById(string $id):Category;
    public function CreateCategory(Category $category):Category;
}


