<?php

namespace App\Http\Controllers\Api;

use App\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Filter\V1\SocialFilter;
use App\Http\Resources\SocialResource;
use App\Models\General\Socialmedia;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Global_;

use function PHPUnit\Framework\isNull;

class SocialmediaController extends Controller
{
    //
    use ApiResponse;


    /**
     * Display  all Social Media and Partner logos 
     * 
     * @queryParam filters[name] string Filter by Name. Example: `filters[name]=String`
     * @queryParam filters[visible] boolean Filter by Visibility. Example: `filters[visible]=1`
     * 
     */
    public function index(SocialFilter $filter)
    {
        $queryParams = request()->query();
    
        $query = Socialmedia::filter($filter);
    
        if (isset($queryParams['visible'])) {
            $query->where('is_visible', $queryParams['visible']);
        } else {
            $query->where('is_visible', true);
        }
    
        return SocialResource::collection($query->get());
    }


    /**
     * Display the specific Social Media and Partner logos 
     *  
     * @urlParam name string required The NAME of the Social Media.
     *
     */
    public function show($siteFeature)
    {
        //

        // dd("hello");

        $feature = Socialmedia::where('name', $siteFeature)->first();
        if (!isset($feature)) {

            return $this->error("Nothing Found");
        }
        // dd($feature);
        return new SocialResource($feature);
    }

    // public function show($name)
    // {
    //     $socialmedia = Socialmedia::where('name', $name)->first();

    //     if ($socialmedia == null) {
    //         return response()->json(['status' => 'Not Found', 'message' => "No Link Found with the Name " . $name]);
    //     }
    //     $baseUrl = asset('storage');

    //     $socialData = collect($socialmedia->social)->map(function ($social) use ($baseUrl) {
    //         return [
    //             'sociallink' => $social['sociallink'],
    //             'linkaddress' => $social['linkaddress'],
    //             'uploaded_image' => $social['upload_image'] ? $social['upload_image'] : false,
    //             'image' => $social['upload_image'] ? $baseUrl . '/' . $social['image'] : null,
    //             'use_url' => $social['use_url'] ? $social['use_url'] : false,
    //             'url' => $social['use_url'] ? $social['url'] : null,
    //             'use_svg' => $social['use_svg'] ? $social['use_svg'] : false,
    //             'html_icon' => $social['html_icon'] ? $social['html_icon'] : null,
    //         ];
    //     });
    //     $data = [
    //         'name' => $socialmedia->name,
    //         'social' => $socialData,
    //     ];
    //     $response = ['status' => 'Success', 'data' => $data];

    //     // return view('demoview', ['data' => $response['data']]);
    //     return response()->json($response);
    // }
}
