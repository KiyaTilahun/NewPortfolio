<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        
        $baseUrl = asset('storage') . '/';
        
        return [
            'type' => 'blog',
            'id' => $this->id,

            'attributes' => [
                'title' => $this->title??null,
                'slug' => $this->slug??null,
                'thumbnail' => $this->thumbnail ? $baseUrl.$this->thumbnail:null ,
                'body' => $this->body??null,
                'is_featured' => $this->is_featured,
                'is_published' => $this->is_published,
                'view_count' => $this->view_count,  
                'author' => $this->author,  
                'published_at' => $this->published_at ? $this->published_at->format('F j, Y, g:i a') : null,
                'meta_title' => $this->meta_title??null,
                'meta_description' => $this->meta_description??null,
                'created_at' => $this->created_at ? $this->created_at->format('F j, Y, g:i a') : null,
                'updated_at' => $this->updated_at ? $this->updated_at->format('F j, Y, g:i a') : null,
            ],

            'links' => [
                'self' => route('posts.show', ['post' => $this->id]),
                'like'=>$this->when(  $request->routeIs('posts.show'),route('posts.like', ['id' => $this->id]))
            ],
            'relationships' => $this->when(
                $request->routeIs(['posts.show']),
                [
                    'category' => [
                        'data' => CategoryResource::collection($this->categories),
                    ],
                ]
            ),
        ];
    }
}
