<?php

namespace App\Filament\Resources\General\SocialmediaResource\Pages;

use App\Filament\Resources\General\SocialmediaResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewSocialmedia extends ViewRecord
{
    protected static string $resource = SocialmediaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
