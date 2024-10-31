<?php

namespace App\Models\General;

use App\Http\Filter\V1\QueryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaCategory extends Model
{
    use HasFactory;


    protected $fillable = ['name'];

    // Define the relationship to MediaItem
    public function mediaItems()
    {
        return $this->hasMany(MediaItem::class);
    }
    public function parent()
    {
        return $this->belongsTo(MediaCategory::class, 'parent_id');
    }


    public function children()
    {
        return $this->hasMany(MediaCategory::class, 'parent_id');
    }
    public function scopeFilter(Builder $builder, QueryFilter $filters) {
        return $filters->apply($builder);
    }

}
