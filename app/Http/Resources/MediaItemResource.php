<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MediaItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [  'id' => $this->id,
        'media_type_id' => $this->mediaType->name,
        // 'media_category_id' => $this->media_category_id,
        'file_path' =>collect($this->file_path)->map(fn($path) => asset('storage/' . $path)),
        'file_label' => $this->file_label,
        'description' => $this->description,
        'created_at' => $this->created_at,  
        'zip_download_link' => $this->when(
         !empty($this->file_path),
            route('download.file', ['id' => $this->id])
        ),];
        
    }
}
