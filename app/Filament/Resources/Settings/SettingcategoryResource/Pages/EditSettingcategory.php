<?php

namespace App\Filament\Resources\Settings\SettingcategoryResource\Pages;

use App\Filament\Resources\Settings\SettingcategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSettingcategory extends EditRecord
{
    protected static string $resource = SettingcategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
