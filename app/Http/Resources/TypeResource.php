<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TypeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        // dd($this);
        return    [
            'title' => $this->title,
            'text_color' => $this->text_color ?? '#000000',
            'bg_color' => $this->bg_color ?? "#FFFFFF"

        ];
    }
}
