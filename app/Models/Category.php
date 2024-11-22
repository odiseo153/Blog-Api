<?php

namespace App\Models;


class Category extends BaseModel
{
    //
    protected $fillable = ['name'];

    public function posts(){
        return $this->belongsToMany(Post::class);
    }

    public function scopeName($query, $search)
    {
        return $query->where('name', 'like', "%$search%");
    }
}




