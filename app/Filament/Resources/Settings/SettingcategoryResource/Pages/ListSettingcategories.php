<?php

namespace App\Filament\Resources\Settings\SettingcategoryResource\Pages;

use App\Filament\Resources\Settings\SettingcategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSettingcategories extends ListRecords
{
    protected static string $resource = SettingcategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('New Setting Category'),
        ];
    }
}
