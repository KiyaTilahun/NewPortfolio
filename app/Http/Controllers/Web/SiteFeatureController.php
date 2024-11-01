<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\General\Footerlink;
use App\Models\General\MediaItem;
use App\Models\General\Socialmedia;
use App\Models\WebContents\SiteFeature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            $socialMedia = Socialmedia::all();
            $socialArray = [];
            
            foreach ($socialMedia as $social) {
                // Decode the JSON data if necessary (assuming 'social' is a JSON string)
                $socialData = $social->social;
                
                // Store the parameters in the array
                $socialArray[$social->name] = [
                    'id' => $social->id,
                    'url' => $socialData, // Assuming you want to access the URL from the JSON data
                    'created_at' => $social->created_at,
                    'updated_at' => $social->updated_at,
                    'is_visible' => $social->is_visible,
                ];
            }
            // dd($socialArray);
        return view('portfolio.index', compact('siteFeaturesArray','footerlogosArray','socialArray'));
    }
    

    public function download($file_label)  {
        
        $mediaItem = MediaItem::where('file_label', $file_label)->first();
        if($mediaItem==null){
            return redirect()->back();
        }
        $filePath = is_array($mediaItem->file_path) ? $mediaItem->file_path[0] : $mediaItem->file_path;
        // Download the file
        return Storage::response('public/'.$filePath);
        
    }
}
