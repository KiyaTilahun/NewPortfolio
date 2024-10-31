<?php

namespace App\Models\WebContents;

use App\Http\Filter\V1\QueryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class SiteFeature extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded=[];

    protected $casts = [
        'data' => 'json',
         'is_visible'=>'boolean'
    ];
    public function getRouteKeyName()
    {
        return 'name';
    }
    public function scopeFilter(Builder $builder, QueryFilter $filters) {
        return $filters->apply($builder);
    }

    public function pages(): MorphToMany
    {
        return $this->morphToMany(Page::class, 'pageable');
    }
}
