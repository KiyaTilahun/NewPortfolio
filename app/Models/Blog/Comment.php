<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;
    protected $fillable=[  
      'post_id',
      'content'
    ];


    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

}