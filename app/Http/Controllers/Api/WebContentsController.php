<?php

namespace App\Http\Controllers\Api;

use App\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Filter\V1\ContentFilter;
use App\Http\Resources\SiteFeatureResource;
use App\Models\WebContents\SiteFeature;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

class WebContentsController extends Controller
{
    use ApiResponse;
    //

    /**
     * Display  all Web Contents
     * 
     * @queryParam filters[name] string Filter by Name. Example: `filters[name]=String`
     * @queryParam filters[visible] boolean Filter by Visibility. Example: `filters[visible]=1`
     */
    public function index(ContentFilter $filter)
    {
        $queryParams = request()->query();

        $query = SiteFeature::filter($filter);
        
        if (isset($queryParams['visible'])) {
            $query->where('is_visible',$queryParams['visible']);
        } else {
            $query->where('is_visible',true);
        }
        return SiteFeatureResource::collection($query->get());
    }

    /**
     * Display the specific Web Contents   
     * 
     *@urlParam name string required The NAME of the Specific Site Feature.
     */
    public function show($siteFeature)
    {
        //

        $feature = SiteFeature::where('name', $siteFeature)->first();
        if (!isset($feature)) {
            return $this->error("Nothing Found");
        }
        return new SiteFeatureResource($feature);
    }
}
