<?php

namespace App\Filament\Resources\General\MediaCategoryResource\Pages;

use App\Filament\Resources\General\MediaCategoryResource;
use App\Filament\Resources\General\MediaItemResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMediaCategory extends CreateRecord
{
    protected static string $resource = MediaCategoryResource::class;
    protected function getRedirectUrl(): string
    {
        // Redirect to the 'create' page of the MediaItem resource after creating a category
        return MediaItemResource::getUrl('create');
    }
}
