<?php
declare(strict_types=1);

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Symfony\Component\Uid\Ulid;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use  HasApiTokens, HasFactory, Notifiable, HasUlids;

    protected $fillable = [
        'name',
        'email',
        'password', 
        'role',
    ];

    
    protected $keyType = 'string';
    public $incrementing = true;
    
   
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }

    public function getFormattedCreatedAt()
{
    return $this->created_at->translatedFormat('l j \d\e F Y \a \l\a\s H:i');
}

public function getFormattedUpdatedAt()
{
    return $this->updated_at->translatedFormat('l j \d\e F Y \a \l\a\s H:i');
}


public function scopeName($query, $search)
{
    return $query->whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($search) . '%']);
}

public function scopeEmail($query, $search)
{
    return $query->whereRaw('LOWER(email) LIKE ?', ['%' . strtolower($search) . '%']);
}

public function scopeRole($query, $search)
{
    $options = explode(',', $search);
    return $query->whereIn('role', $options);
}


    public function newUniqueId(): string
{
    return (string) Ulid::generate();
}

}
