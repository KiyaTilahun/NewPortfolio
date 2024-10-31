<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory,SoftDeletes;


    protected $fillable=[  
        'title',
        'slug',
        'content',
        'bg_color',
        'text_color',
        'meta_description'
        
    ];


    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class);
    }

}
