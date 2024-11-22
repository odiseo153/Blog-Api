<?php

namespace App\Models;


class View extends BaseModel
{
    //
    protected $fillable = [
        'post_id',
        'user_id'
    ];


    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}




