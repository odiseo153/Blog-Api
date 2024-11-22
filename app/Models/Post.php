<?php

namespace App\Models;

class Post extends BaseModel
{
    protected $fillable = [
        'title',
        'content',
        'user_id',
        'publish_date',
        'category_id',
        'views_count',
        'like_count',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsToMany(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tag');
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }



    
  // Scopes for searching posts
  public function scopeTitle($query, $search)
  {
      return $query->whereRaw('LOWER(title) LIKE ?', ['%' . strtolower($search) . '%']);
  }

  public function scopeContent($query, $search)
  {
      return $query->whereRaw('LOWER(content) LIKE ?', ['%' . strtolower($search) . '%']);
  }

  public function scopeAuthorName($query, $search)
  {
    return $query->whereHas('author', function ($query) use ($search) {
        $query->where('name', 'like', "%$search%");
    });
  }

  public function scopeCategoryName($query, $search)
  {
    return $query->whereHas('category', function ($query) use ($search) {
        $query->where('name', 'like', "%$search%");
    });
  }

  public function scopePublishedAfter($query, $date)
  {
      return $query->where('publish_date', '>=', $date);
  }

  public function scopePublishedBefore($query, $date)
  {
      return $query->where('publish_date', '<=', $date);
  }


}
