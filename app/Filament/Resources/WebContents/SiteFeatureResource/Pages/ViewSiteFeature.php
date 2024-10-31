<?php

namespace App\Filament\Resources\WebContents\SiteFeatureResource\Pages;

use App\Filament\Resources\WebContents\SiteFeatureResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewSiteFeature extends ViewRecord
{
    protected static string $resource = SiteFeatureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
    
}
