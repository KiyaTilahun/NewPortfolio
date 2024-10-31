<?php

namespace App\Filament\Resources\Blog\PostResource\Pages;

use App\Filament\Resources\Blog\PostResource;
use App\Models\Blog\Post;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\ViewRecord;

class ViewPost extends ViewRecord
{
    protected static string $resource = PostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('share')->icon('heroicon-o-share')
            ->url(fn (Post $record): string => route('demoshare',['post'=>$record->id]))->openUrlInNewTab()->color('success'),
            Actions\EditAction::make(),
        ];
    }
}
