<?php

namespace App\Models\General;

use App\Http\Filter\V1\QueryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use RalphJSmit\Laravel\SEO\Support\HasSEO;

class Footerlink extends Model
{
    use HasFactory,HasSEO;

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
    
}
