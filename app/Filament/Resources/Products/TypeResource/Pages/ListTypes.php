<?php

namespace App\Filament\Resources\Products\TypeResource\Pages;

use App\Filament\Resources\Products\TypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTypes extends ListRecords
{
    protected static string $resource = TypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Add New Product Type')->color('success'),
        ];
    }
}
