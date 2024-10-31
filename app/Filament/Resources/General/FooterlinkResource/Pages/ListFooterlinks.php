<?php

namespace App\Filament\Resources\General\FooterlinkResource\Pages;

use App\Filament\Resources\General\FooterlinkResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFooterlinks extends ListRecords
{
    protected static string $resource = FooterlinkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
