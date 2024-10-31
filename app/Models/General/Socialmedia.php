<?php

namespace App\Models\General;

use App\Http\Filter\V1\QueryFilter;
use App\Models\WebContents\Page;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Socialmedia extends Model
{
    use HasFactory;

    protected $guarded=[];

    
    protected $casts = [
        'social' => 'array',
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
