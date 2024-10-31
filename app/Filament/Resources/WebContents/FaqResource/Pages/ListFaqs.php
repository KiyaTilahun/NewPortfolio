<?php

namespace App\Filament\Resources\WebContents\FaqResource\Pages;

use App\Filament\Resources\WebContents\FaqResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFaqs extends ListRecords
{
    protected static string $resource = FaqResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Create new FAQ'),
        ];
    }
}
