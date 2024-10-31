<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SettingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public static $wrap = "setting";
    public function toArray($request)
    {
        return [
           $this->name=> $this->type === 'Boolean' 
           ? ($this->value == 1 ? true : ($this->value == 0 ? false : $this->value))
           : $this->value,
        ];
    }
    
}
