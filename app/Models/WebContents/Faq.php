<?php

namespace App\Models\WebContents;

use App\Http\Filter\V1\QueryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Faq extends Model
{
    use HasFactory;
    protected $guarded=[];

    protected $casts=[
        "is_active"=>"boolean"
    ];

    public function scopeFilter(Builder $builder, QueryFilter $filters) {
        return $filters->apply($builder);
    }
    public function pages(): MorphToMany
    {
        return $this->morphToMany(Page::class, 'pageable');
    }
}
