<?php

namespace App\Models;


class Post_tag extends BaseModel
{
    protected $fillable = [
        'post_id',
        'tag_id',
    ];

    public function post(){
        return $this->belongsTo(Post::class);
    }

    public function tag(){
        return $this->belongsTo(Tag::class);
    }

}






