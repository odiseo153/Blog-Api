<?php

namespace App\Post\Sorts;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Sorts\Sort;

class UserNameSort implements Sort
{
    public function __invoke(Builder $query, $descending, string $property)
    {
        $query->orderBy(
            Category::select('name')
                ->whereColumn('users.id', 'posts.user_id'),
            $descending ? 'desc' : 'asc'
        );
    }
}
