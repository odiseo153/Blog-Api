<?php 
namespace App\Category\Domain\Entities;


class Category{
    public $id;
    public $name;

    public function __construct(array $data)
    {
        $this->id = $data['id'] ?? null;
        $this->name = $data['name'] ?? null;
    }
}

 