<?php

namespace App\Filament\Resources\Products\TypeResource\Pages;

use App\Filament\Resources\Products\TypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewType extends ViewRecord
{
    protected static string $resource = TypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
