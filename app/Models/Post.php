<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $casts = [
        'published_at' => 'date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function isScheduled()
    {
        if ($this->isDraft()) {
            return false;
        }
        return $this->published_at->gt(now());
    }

    public function isDraft()
    {
        return is_null($this->published_at);
    }
}
