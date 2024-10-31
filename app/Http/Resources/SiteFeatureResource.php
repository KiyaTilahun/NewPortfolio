<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SiteFeatureResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    protected $wrapper = '';
    public function toArray(Request $request): array
    {


         $filteredData = collect($this->data)->filter(function ($item) {
            return $item['visibility'] === true;
        });
        $filteredData = $filteredData->map(function ($item) {
            if (!empty($item['image'])) {
                $item['image'] = asset('storage/' . $item['image']);
            }
            return $item;
        });
        
        $routeName = null;
        if ($request->route()->getName() == 'pages.show') {
            $routeParameters = $request->route()->parameters();
            if ($routeParameters) {
                $routeName = $routeParameters['page']->name;
            }
        $filteredData = collect($this->data)->filter(function ($item) use ($routeName) {
            if (empty($item['page_names'])) {
                return $item['visibility'] === true;
            }
    
            return $item['visibility'] === true &&
                   isset($item['page_names']) &&
                   in_array($routeName, $item['page_names']);
            });
        }
    
       
    
        return [
            "type" => "web contents",
            $this->name => [
                'visible' => $this->is_visible,
                'title' => $this->title ?: null,
                'description' => $this->description ?: null,
                'attributes' => SiteFeatureDataResource::collection($filteredData),
                'seo' => [
                    'title' => $this->meta_title,
                    'description' => $this->meta_description,
                ],
            ]
        ];

        // if ($request->route()->getName() == 'pages.show') {
        //     $routeName = $request->route()->parameters();
        //     $routeName = $routeName['page']->name;
       

        // }
       
      

     
        // return
        //     [
        //         "type" => "web contents",

        //         $this->name => [
        //             'visible' => $this->is_visible,
        //             'title' => $this->title ?: null,
        //             'description' => $this->description ?: null,
        //             'attributes' => SiteFeatureDataResource::collection($filteredData),
        //             'seo' => [
        //                 'title' => $this->meta_title,
        //                 'description' => $this->meta_description
        //             ],

        //         ]
        //     ];
    }
}
