<?php

namespace App\Post\Sorts;

use App\Models\Tag;
use App\Models\Category;
use Spatie\QueryBuilder\Sorts\Sort;
use Illuminate\Database\Eloquent\Builder;

class TagNameSort implements Sort
{
    public function __invoke(Builder $query, $descending, string $property)
    {
        $query->orderBy(
            Tag::select('name')
                ->join('post_tag', 'tags.id', '=', 'post_tag.tag_id')
                ->whereColumn('post_tag.post_id', 'posts.id')
                ->limit(1), // Ordena por el primer tag (puedes ajustar según tus necesidades)
            $descending ? 'desc' : 'asc'
        );
    }
}

