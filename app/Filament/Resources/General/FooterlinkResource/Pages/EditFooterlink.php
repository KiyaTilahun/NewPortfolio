<?php

namespace App\Filament\Resources\General\FooterlinkResource\Pages;

use App\Filament\Resources\General\FooterlinkResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFooterlink extends EditRecord
{
    protected static string $resource = FooterlinkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
