<?php

namespace App\Post\Sorts;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Sorts\Sort;

class CategoryNameSort implements Sort
{
    public function __invoke(Builder $query, $descending, string $property)
    {
        $query->orderBy(
            Category::select('name')
                ->whereColumn('categories.id', 'posts.category_id'),
            $descending ? 'desc' : 'asc'
        );
    }
}
