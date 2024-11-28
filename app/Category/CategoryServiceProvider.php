<?php

namespace App\Category;

use Illuminate\Support\ServiceProvider;
use App\Category\Domain\Contracts\CategoryRepositoryPort;
use App\Category\Adapters\Repositories\CategoryRepository;

class CategoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(CategoryRepositoryPort::class, CategoryRepository::class);
    }

    public function boot() {}
}
