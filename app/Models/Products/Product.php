<?php

namespace App\Models\Products;

use App\Http\Filter\V1\QueryFilter;
use App\Models\WebContents\Page;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];

    protected $casts = [
        'gallery' => 'array',
        'details' => 'array',
    ];


    public function types(): BelongsToMany
    {
        return $this->belongsToMany(Type::class);
    }

    public function scopeFilter(Builder $builder, QueryFilter $filters) {
        return $filters->apply($builder);
    }
    public function pages(): MorphToMany
    {
        return $this->morphToMany(Page::class, 'pageable');
    }
}
