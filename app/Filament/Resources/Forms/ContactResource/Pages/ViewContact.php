<?php

namespace App\Filament\Resources\Forms\ContactResource\Pages;

use App\Filament\Resources\Forms\ContactResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewContact extends ViewRecord
{
    protected static string $resource = ContactResource::class;

    // protected function getHeaderActions(): array
    // {
    //     return [
    //         Actions\EditAction::make(),
    //     ];
    // }
    function fillForm(): void
    {
        

    }
  
}
