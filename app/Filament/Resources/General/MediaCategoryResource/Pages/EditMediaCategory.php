<?php

namespace App\Filament\Resources\General\MediaCategoryResource\Pages;

use App\Filament\Resources\General\MediaCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMediaCategory extends EditRecord
{
    protected static string $resource = MediaCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
