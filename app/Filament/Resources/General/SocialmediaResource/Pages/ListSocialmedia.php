<?php

namespace App\Filament\Resources\General\SocialmediaResource\Pages;

use App\Filament\Resources\General\SocialmediaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSocialmedia extends ListRecords
{
    protected static string $resource = SocialmediaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
