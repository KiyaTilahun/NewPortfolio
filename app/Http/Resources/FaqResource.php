<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FaqResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
      $baseUrl = asset('storage'); 

        return [
          "type"=>"faqs",
          "attributes"=>[
            'is_active' => $this->is_active,
            'question' => $this->question,
            'answer' => $this->answer,
           
          ]
        ];
    }
}
