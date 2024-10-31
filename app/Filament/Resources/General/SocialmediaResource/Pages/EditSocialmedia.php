<?php

namespace App\Filament\Resources\General\SocialmediaResource\Pages;

use App\Filament\Resources\General\SocialmediaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSocialmedia extends EditRecord
{
    protected static string $resource = SocialmediaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
