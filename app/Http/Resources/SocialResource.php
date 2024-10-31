<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SocialResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // dd($this);
        $baseUrl = asset('storage') . '/';
        $social = $this->social;  
        $filteredSocialLinks = array_filter($social, function ($socialLink) {
            return $socialLink['visibility'] ?? false; // Filter out links that are not visible
        });
    //   dd($social);
        
        $formattedSocialLinks = array_map(function ($socialLink) use ($baseUrl) {
            return [
                'name' => $socialLink['sociallink'] ?? null,
                'url' => $socialLink['url'] ?? null,
                'image' => $socialLink['image'] ? $baseUrl . $socialLink['image'] : null,
                'html_icon' => $socialLink['html_icon'] ?? null,
                'linkaddress' => $socialLink['linkaddress'] ?? null,
            ];
        }, $filteredSocialLinks);

    return [
        'type' => 'social links',
        $this->name => 
           $formattedSocialLinks,
       
    ];
    }
}
