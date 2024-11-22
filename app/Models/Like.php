<?php

namespace App\Models;


class Like extends BaseModel
{
    //
    protected $table = 'likes';
    protected $fillable = ['user_id', 'post_id', 'like_date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
 