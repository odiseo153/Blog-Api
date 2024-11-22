<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends BaseModel
{
    
    protected $fillable = [
        'user_id',
        'post_id',
        'content',
        'parent_comment_id',  // To allow nested comments
    ];


    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function post(){
        return $this->belongsTo(Post::class, 'post_id');
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_comment_id');
    }

    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_comment_id');
    }

    public function scopeContent($query, $search)
    {
        return $query->where('content', 'like', "%$search%");
    }
}
