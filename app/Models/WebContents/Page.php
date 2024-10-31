<?php

namespace App\Models\WebContents;

use App\Models\General\Socialmedia;
use App\Models\Products\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded=[];

    public function getRouteKeyName()
    {
        return 'name';
    }
    
    public function siteFeatures(): MorphToMany
    {
        return $this->morphedByMany(SiteFeature::class, 'pageable');
    }
    public function faqs(): MorphToMany
    {
        return $this->morphedByMany(Faq::class, 'pageable');
    }
    public function socialmedias(): MorphToMany
    {
        return $this->morphedByMany(Socialmedia::class, 'pageable');
    }
    public function products(): MorphToMany
    {
        return $this->morphedByMany(Product::class, 'pageable');
    }
  
  
}
