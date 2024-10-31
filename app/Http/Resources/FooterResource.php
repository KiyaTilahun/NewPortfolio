<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FooterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
{
    $baseUrl = asset('storage') . '/';

    $arrayData = json_encode($this->data, true);
    $arrayData = json_decode($arrayData, true);

    $footerData = [
        'visible' => $this->is_visible,
        'title' => $arrayData['title'] ?? null,
        'url'=>$this->url??'#',
        'image' => isset($arrayData['image']) ? $baseUrl . $arrayData['image'] : null,
        'description' => $arrayData['description'] ?? null,
    ];

    // Add 'seo' key if either 'meta_title' or 'meta_description' exists
    if (isset($arrayData['meta_title']) || isset($arrayData['meta_description'])) {
        $footerData['seo'] = [
            'meta_title' => $arrayData['meta_title'] ?? null,
            'meta_description' => $arrayData['meta_description'] ?? null,
        ];
    }

    return [
        "type" => "Footer",
        $this->name => $footerData,
    ];
}
}
