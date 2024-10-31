<?php

namespace App\Filament\Resources\WebContents\FaqResource\Pages;

use App\Filament\Resources\WebContents\FaqResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewFaq extends ViewRecord
{
    protected static string $resource = FaqResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
