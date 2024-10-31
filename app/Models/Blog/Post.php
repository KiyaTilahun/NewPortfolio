<?php

namespace App\Models\Blog;

use App\Http\Filter\V1\QueryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Config;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'thumbnail',
        'body',
        'is_featured',
        'is_published',
        'published_at',
        'meta_description'

    ];

    protected $casts = [
        'is_published' => 'boolean',
        'is_featured' => 'boolean',
        'published_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'


    ];
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function scopeFilter(Builder $builder, QueryFilter $filters) {
        return $filters->apply($builder);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($blog) {
            $blog->body = self::updateImagePaths($blog->body);
        });

        static::updating(function ($blog) {
            $blog->body = self::updateImagePaths($blog->body);
        });
    }

    public static function updateImagePaths($content)
    {
        $baseUrl = asset('storage');
        return str_replace('src="/storage', 'src="' . $baseUrl , $content);
    }

    // Post Like
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    // Method to count likes
    public function likeCount()
    {
        return $this->likes()->count();
    }
}
