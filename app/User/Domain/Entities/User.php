<?php

namespace App\User\Domain\Entities;

class User
{
    public $id;
    public $name;
    public $username;
    public $email;
    public $password;
    public $role;
    public $posts;
    public $created_at;
    public $updated_at;

    public function __construct(array $data)
    {
        $this->id = $data['id'] ?? null;
        $this->name = $data['name'];
        $this->username = $data['username'];
        $this->email = $data['email'] ?? null;
        $this->password = $data['password'] ?? null;
        $this->posts = $data['posts'] ?? null;
        $this->role = $data['role'];
        $this->created_at = $data['created_at'] ?? null;
        $this->updated_at = $data['updated_at'] ?? null;
    }
}
