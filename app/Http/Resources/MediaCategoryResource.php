<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MediaCategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $isShowRequest = $request->routeIs('mediaCategories.show');
        return [
            'id' => $this->id,
            'name' => $this->name,
            'self_link' =>  route('mediaCategories.show', ['mediaCategory' => $this->id]),
            'children' => $this->when(
                $this->children()->exists() && $isShowRequest,
                $this->children->map(function ($child) {
                    return [
                        'id' => $child->id,
                        'name' => $child->name,
                        'folder_link' => route('mediaCategories.show', ['mediaCategory' => $child->id]),
                    ];
                })
            ),
          
            'files' => $this->when(
                $this->mediaItems()->exists(),
                MediaItemResource::collection($this->mediaItems)
            ),
           

        ];
    }
}
