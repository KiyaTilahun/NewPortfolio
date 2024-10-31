<?php

namespace App\Http\Controllers\Api;

use App\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Filter\V1\FooterFilter;
use App\Http\Resources\FooterResource;
use App\Models\General\Footerlink;
use Illuminate\Http\Request;

use function Pest\Laravel\json;

class FooterlinkController extends Controller
{
    use ApiResponse;
    //
    /**
     * Display  all Footer Links and Logos
     *  
     * @queryParam filters[name] string Filter by Name. Example: `filters[name]=example`
     * @queryParam filters[visible] boolean Filter by Visibility. Example: `filters[visible]=1`
     * 
     */
    public function index(FooterFilter $filter)
    {
        $queryParams = request()->query();
    
        $query = Footerlink::filter($filter);
    
        if (isset($queryParams['visible'])) {
            $query->where('is_visible', $queryParams['visible']);
        } else {
            $query->where('is_visible', true);
        }
    
        return FooterResource::collection($query->get());
    }

    /**
     * Display the specific Footer Links and Logos 
     * 
     * @urlParam name string required The NAME of the FOOTER SECTION NAME.
     */
    public function show($footerlink)
    {
        //

        $feature = Footerlink::where('name', $footerlink)->first();
        // dd($feature);

        if (!isset($feature)) {
            return $this->error("Nothing Found");
        }
        return new FooterResource($feature);
    }

    //    return response()->json(["message" => "yes"], 200);



}
