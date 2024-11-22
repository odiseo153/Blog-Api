<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends BaseModel
{
    // 
    protected $fillable = ['name'];

    public function posts(){
        return $this->belongsToMany(Post::class,'post_tag');
    }

    public function scopeName($query, $search)
    {
        return $query->where('name', 'like', "%$search%");
    }
}
