<?php

namespace App\Models;


class Audit_log extends BaseModel
{
    //
    
    protected $fillable = [
        'user_id',
        'action',        // Description of action (e.g., 'created_post', 'deleted_comment')
        'target_id',     // ID of the target resource (post, comment, etc.)
        'target_type',   // Type of the target resource (e.g., 'Post', 'Comment')
        'description',   // Additional details
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}






