<?php

namespace App\Filament\Resources\General\MediaItemResource\Pages;

use App\Filament\Resources\General\MediaItemResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMediaItem extends EditRecord
{
    protected static string $resource = MediaItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
