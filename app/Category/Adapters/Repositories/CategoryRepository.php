<?php

namespace App\Category\Adapters\Repositories;

use Spatie\QueryBuilder\AllowedSort;
use Spatie\QueryBuilder\AllowedFilter;
use App\Models\Category as CategoryModel;
use App\Category\Domain\Entities\Category;
use App\Shared\Repositories\BaseRepository;
use App\Category\Domain\Contracts\CategoryRepositoryPort;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;


class CategoryRepository extends BaseRepository implements CategoryRepositoryPort
{
    
    public function __construct()
    {
        parent::__construct(CategoryModel::class);
    }

    public function getAll(int $perPage, array $filters = [], array $sorts = [], string $defaultSort = 'updated_at', array $with = ['user','post']): LengthAwarePaginator
    {
        $sorts = [
            AllowedSort::field('name'),
        ];

        $filters = [
            AllowedFilter::scope('name'),
        ];

        return parent::getAll($perPage, $filters, $sorts, $defaultSort, $with);
    }

    public function CreateCategory(Category $category):Category
    {
        $categoryModel = CategoryModel::create([
            'name' => $category->name 
        ]); 

        return new Category($categoryModel->toArray());
    }

    public function categoryById(string $id):Category
    {
        $category = CategoryModel::findOrFail($id);

        return $category; 
    }


} 