<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NaviagationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

  
    public function toArray(Request $request): array
    {
        // dd($this);
        // dd($this->submenus);
    
        return [
            'name' => $this->name,
            'url' => $this->url,
            'hasIcon' => (bool) $this->hasIcon,
            'icon' => $this->icon,
            'hasSubmenu' => (bool) $this->hasSubmenu,
            // 'j'=>$this->submenus,
            'submenus' =>  $this->when(
                $this->submenus,
                SubmenuResource::collection(collect($this->submenus)->filter(fn($submenu) => $submenu['visibility'] ?? false)??null)
            ),
            // 'hasSetting' => (bool) $this->hasSetting,
            // 'settings' => $this->settings ? SettingResource::collection($this->settings) : null,
        ];
    }
}
