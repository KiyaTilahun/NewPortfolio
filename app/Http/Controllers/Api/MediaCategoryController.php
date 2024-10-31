<?php

namespace App\Http\Controllers\Api;

use App\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Filter\V1\MediaCategoryFilter;
use App\Http\Resources\MediaCategoryResource;
use App\Http\Resources\MediaItemResource;
use App\Models\General\MediaCategory;
use App\Models\General\MediaItem;
use Illuminate\Http\Request;

class MediaCategoryController extends Controller
{
    use ApiResponse;
    //

       /**
     * Display  all parent Categories/Folders
     * 
     * @queryParam filters[name] Filter by Name. Example: `filters[name]=String`
     */
    public function index(MediaCategoryFilter $filter){
        $queryParams = request()->query();

        $query = MediaCategory::filter($filter)
            ->orderBy('created_at', 'desc');
        
        if (isset($queryParams['name'])) {
            $query->whereNotNull('parent_id');
        } else {
            $query->whereNull('parent_id');
        }
        
        return MediaCategoryResource::collection($query->get());
    }


      /**
     * Display Specific Media Category
     * 
     * @urlParam id integer required The ID of the MediaCategory.
     */
    public function show(MediaCategory $mediaCategory)
    {

        if (!isset($mediaCategory)) {

            return $this->error("Nothing Found");
        }
        return new MediaCategoryResource($mediaCategory);
    }

    public function demofolder(){


        return view('demoFolder');
    }
}
