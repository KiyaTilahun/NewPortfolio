<?php

namespace App\Filament\Resources\Blog\PostResource\Pages;

use App\Filament\Resources\Blog\PostResource;
use App\Models\Blog\Post;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListPosts extends ListRecords
{
    protected static string $resource = PostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    public function getTabs(): array
{
    return [
        'All' => Tab::make()->badge(
            Post::all()->count()
        ),
        'Published' => Tab::make()
            ->modifyQueryUsing(fn (Builder $query) => $query->where('is_published', true))->badge(
                Post::query()->where('is_published', true)->count()
            ),

         'Featured' => Tab::make()
            ->modifyQueryUsing(fn (Builder $query) => $query->where('is_featured', true))->badge(
                Post::query()->where('is_featured', true)->count()
            ),
        // 'inactive' => Tab::make()
        //     ->modifyQueryUsing(fn (Builder $query) => $query->where('active', false)),
    ];
}
}
