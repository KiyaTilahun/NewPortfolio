<?php

namespace App\Filament\Resources\Navigation\MenuResource\Pages;

use App\Filament\Resources\Navigation\MenuResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMenu extends CreateRecord
{
    protected static string $resource = MenuResource::class;

    protected function getRedirectUrl(): string {
        return static::getResource()::getUrl('index');
    }
}
