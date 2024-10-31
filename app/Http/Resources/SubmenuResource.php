<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SubmenuResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // dd($this);
        return [
            'title' => $this['title'] ?? null,
            'url' => $this['url'] ?? null,
            'hasSecondSubmenu' => $this['hasSecondSubmenu'] ?? false,
            'secondsubmenus' => $this->when(
                $this['hasSecondSubmenu'] ?? false && isset($this['secondsubmenus']),
                SecondSubmenuResource::collection(
                    collect($this['secondsubmenus'] ?? [])
                        ->filter(fn($secondSubmenu) => $secondSubmenu['visibility'] ?? false)
                )
            ),
        ];
    }
}
