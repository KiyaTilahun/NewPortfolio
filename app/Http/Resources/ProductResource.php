<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $baseUrl = asset('storage') . '/';

        // dd(gettype($this->detail));
        return [
            'type' => 'product',

            'attributes' => [

                'id' => $this->id ?? null,
                'name' => $this->name ?? null,
                'slug' => $this->slug ?? null,
                'thumbnail' => $this->thumbnail ? $baseUrl . $this->thumbnail : null,
                'description' => $this->description ?? null,
                'price' => $this->price ?? null,
                'rating' => $this->rating ?? null,
                'is_featured' => $this->is_featured,
                'is_available' => $this->is_available,
                'gallery' => $this->gallery ? array_map(function ($image) {
                    return asset('storage/' . $image);
                }, $this->gallery) : [],
                'details' => $this->details ? $this->details : [],
                'meta_title' => $this->meta_title ?? null,
                'meta_description' => $this->meta_description ?? null,

            ],
            'links' => [
                ['self' => route('products.show', ['product' => $this->id])]
            ],
            'relationships' => [
                'type' => [

                    TypeResource::collection($this->types),
                ],
            ],
        ];
    }
}
