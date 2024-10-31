<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\General\Footerlink;
use App\Models\WebContents\SiteFeature;
use Illuminate\Http\Request;

class SiteFeatureController extends Controller
{
    //

     /**
     * Display  all Web Contents
     * 
     * @queryParam filters[name] string Filter by Name. Example: `filters[name]=String`
     * @queryParam filters[visible] boolean Filter by Visibility. Example: `filters[visible]=1`
     */
    public function index()
    {
        
        // dd($siteFeatures);
        $footerlogos=Footerlink::all();
        $footerlogosArray = [];
        foreach ($footerlogos as $footerlogo) {
            $footerlogosArray[$footerlogo->name] = $footerlogo->data; // Decode JSON to array
        }
        $siteFeatures = SiteFeature::all();
        $siteFeaturesArray = [];
        foreach ($siteFeatures as $siteFeature) {
            // Decode the JSON data to an associative array
          
            
            // Store the parameters in the array
            $siteFeaturesArray[$siteFeature->name] = [
                'id' => $siteFeature->id,
                'title' => $siteFeature->title,
                'description' => $siteFeature->description,
                'is_visible' => $siteFeature->is_visible,
                'meta_title' => $siteFeature->meta_title,
                'meta_description' => $siteFeature->meta_description,
                'data' => $siteFeature->data, 
                'created_at' => $siteFeature->created_at,
                'updated_at' => $siteFeature->updated_at,
            ];}
//    dd($siteFeaturesArray);
        return view('portfolio.index', compact('siteFeaturesArray','footerlogosArray'));
    }
    
}
