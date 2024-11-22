<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends BaseModel
{

    //
    protected $fillable = [
        'user_id',
        'type',       // Type of notification (e.g., new_comment, new_reply)
        'data',       // JSON data for additional information
        'read_at'     // Timestamp for when the notification was read
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
